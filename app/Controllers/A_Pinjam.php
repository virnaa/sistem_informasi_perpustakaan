<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\PinjamModel;

class A_Pinjam extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        $this->cek_anggota();
        helper(['form']);
        $this->PinjamModel = new PinjamModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {

        if ($this->cek_anggota() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }

        $currentPage = $this->request->getVar('page_pinjam') ? $this->request->getVar('page_pinjam') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->PinjamModel->search($keyword);
        } else {
            $pinjam = $this->PinjamModel;
        }

        $id = session()->get('id_anggota');
        $data = [
            'tittle' => 'Data Peminjaman',
            'pinjam'  => $this->PinjamModel
                ->join('anggota', 'anggota.id_anggota = pinjam.id_anggota')
                ->join('buku', 'buku.id_buku = pinjam.id_buku')
                ->where('anggota.id_anggota', $id)
                ->orderBy('id_pinjam', 'DESC')
                ->paginate(5, 'pinjam'),
            'pager' => $this->PinjamModel->pager,
            'currentPage' => $currentPage
        ];
        echo view('anggota/pinjam/pinjam', $data);
    }



    public function create()
    {

        $anggota = $this->AnggotaModel->findAll();
        $buku = $this->BukuModel->findAll();
        $data = [
            'tittle'  => 'Tambah Peminjaman',
            'anggota' => ['' => 'Pilih Anggota'] + array_column($anggota, 'nama_anggota', 'id_anggota'),
            'buku'    => ['' => 'Pilih Buku'] + array_column($buku, 'judul', 'id_buku'),
        ];
        return view('anggota/pinjam/create', $data);
    }

    public function create_buku($id)
    {

        $anggota = $this->AnggotaModel->findAll();
        $buku = $this->BukuModel->findAll();
        $data = [
            'tittle'  => 'Tambah Peminjaman',
            'anggota' => ['' => 'Pilih Anggota'] + array_column($anggota, 'nama_anggota', 'id_anggota'),
            'buku'    => ['' => 'Pilih Buku'] + array_column($buku, 'judul', 'id_buku'),
            'buku'  => $this->BukuModel->getBuku($id)->getRowArray()

        ];
        return view('anggota/pinjam/pinjam_buku', $data);
    }

    public function store_buku()
    {

        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama anggota harus diisi',
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal peminjaman harus diisi',
                ]
            ],
            'id_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal pengembalian harus diisi',
                ],
                'total_buku' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'stok buku harus diisi',
                    ]
                ]
            ]
        ])) {



            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('create')->withInput();
        }

        $total_buku = $this->request->getPost('total_buku');
        $id_buku = $this->request->getPost('id_buku');
        $stok = $this->BukuModel->getBuku($id_buku)->getRow('stok', $id_buku);

        if ($total_buku > $stok) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('danger', 'Stok buku tidak mencukupi');
            return redirect()->to('create_buku/ . $id')->withInput();
        } else {


            $data = array(
                'status_pinjam'     => $this->request->getPost('status_pinjam'),
                'id_anggota'     => $this->request->getPost('id_anggota'),
                'tgl_pinjam'     => $this->request->getPost('tgl_pinjam'),
                'tgl_kembali'    => $this->request->getPost('tgl_kembali'),
                'id_buku'     => $this->request->getPost('id_buku'),
                'total_buku'     => $this->request->getPost('total_buku')
            );
            $simpan = $this->PinjamModel->insertPinjam($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data peminjaman Berhasil Ditambah');
                return redirect()->to(base_url('anggota/pinjam'));
            }
        }
    }

    public function store()
    {

        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama anggota harus diisi',
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal peminjaman harus diisi',
                ]
            ],
            'id_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal pengembalian harus diisi',
                ],
                'total_buku' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'stok buku harus diisi',
                    ]
                ]
            ]
        ])) {



            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('create')->withInput();
        }

        $total_buku = $this->request->getPost('total_buku');
        $id_buku = $this->request->getPost('id_buku');
        $stok = $this->BukuModel->getBuku($id_buku)->getRow('stok', $id_buku);

        if ($total_buku > $stok) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('danger', 'Stok buku tidak mencukupi');
            return redirect()->to('create')->withInput();
        } else {


            $data = array(
                'status_pinjam'     => $this->request->getPost('status_pinjam'),
                'id_anggota'     => $this->request->getPost('id_anggota'),
                'tgl_pinjam'     => $this->request->getPost('tgl_pinjam'),
                'tgl_kembali'    => $this->request->getPost('tgl_kembali'),
                'id_buku'     => $this->request->getPost('id_buku'),
                'total_buku'     => $this->request->getPost('total_buku')
            );
            $simpan = $this->PinjamModel->insertPinjam($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data peminjaman Berhasil Ditambah');
                return redirect()->to(base_url('anggota/pinjam'));
            }
        }
    }


    public function detail($id)
    {

        $model = new PinjamModel();
        $data = [
            'pinjam' => $model->getPinjam($id)->getRowArray(),
            'tittle' => 'Detail Peminjaman'
        ];
        echo view('anggota/pinjam/detail', $data);
    }

    public function edit($id)
    {
        $anggota = $this->AnggotaModel->findAll();
        $buku = $this->BukuModel->findAll();

        $data = [
            'tittle'  => 'Edit Data Peminjaman',
            'anggota' => ['' => 'Pilih Anggota'] + array_column($anggota, 'nama_anggota', 'id_anggota'),
            'buku'    => ['' => 'Pilih Buku'] + array_column($buku, 'judul', 'id_buku'),
            'pinjam'  => $this->PinjamModel->getPinjam($id)->getRowArray()
        ];
        return view('anggota/pinjam/edit', $data);
    }

    public function update()
    {

        $id = $this->request->getPost('id_pinjam');

        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama anggota harus diisi',
                ]
            ],
            'tgl_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal peminjaman harus diisi',
                ]
            ],
            'id_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul buku harus diisi',
                ]
            ],
            'tgl_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tanggal pengembalian harus diisi',
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('edit/' . $id)->withInput();
        }
        $total_buku = $this->request->getPost('total_buku');
        $id_buku = $this->request->getPost('id_buku');
        $stok = $this->BukuModel->getBuku($id_buku)->getRow('stok', $id_buku);

        if ($total_buku > $stok) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('danger', 'Stok buku tidak mencukupi');
            return redirect()->to('edit/' . $id)->withInput();
        } else {
            $data = array(
                'status_pinjam'     => $this->request->getPost('status_pinjam'),
                'id_anggota'     => $this->request->getPost('id_anggota'),
                'tgl_pinjam'     => $this->request->getPost('tgl_pinjam'),
                'tgl_kembali'    => $this->request->getPost('tgl_kembali'),
                'id_buku'     => $this->request->getPost('id_buku'),
                'total_buku'     => $this->request->getPost('total_buku')
            );


            $model = new PinjamModel();
            $ubah = $model->updatePinjam($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Update peminjaman sukses');
                return redirect()->to(base_url('anggota/pinjam'));
            }
        }
    }


    public function delete($id)
    {
        $hapus = $this->PinjamModel->deletePinjam($id);

        if ($hapus) {
            session()->setFlashdata('warning', 'Delete peminjaman sukses');
            return redirect()->to(base_url('anggota/pinjam'));
        }
    }
}
