<?php

namespace App\Controllers;


use App\Models\KembaliModel;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use CodeIgniter\Controller;
use App\Models\PinjamModel;

class Kembali extends BaseController
{

    protected $helpers = [];
    public function __construct()
    {

        $this->cek_login();
        helper(['form']);
        $this->PinjamModel = new PinjamModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->BukuModel = new BukuModel();
        $this->KembaliModel = new KembaliModel();
    }

    public function index()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        $currentPage = $this->request->getVar('page_kembali') ? $this->request->getVar('page_kembali') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->KembaliModel->search($keyword);
        } else {
            $kembali = $this->KembaliModel;
        }
        $data = [
            'tittle' => 'Data Pengembalian',
            'kembali'  => $this->KembaliModel
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->orderBy('id_kembali', 'DESC')
                ->paginate(5, 'kembali'),
            'pager' => $this->KembaliModel->pager,
            'currentPage' => $currentPage
        ];
        echo view('admin/kembali/kembali', $data);
    }


    public function create($id)
    {
        $anggota = $this->AnggotaModel->findAll();
        $buku = $this->BukuModel->findAll();
        $data = [
            'tittle'  => 'Pengembalian Buku',
            'anggota' => ['' => 'Pilih Anggota'] + array_column($anggota, 'nama_anggota', 'id_anggota'),
            'buku'    => ['' => 'Pilih Buku'] + array_column($buku, 'judul', 'id_buku'),
            'pinjam'  => $this->PinjamModel->getPinjam($id)->getRowArray()
        ];
        return view('admin/kembali/create', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id_pinjam');

        if (!$this->validate([
            'id_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id anggota harus diisi'
                ]
            ],
            'id_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'id_pinjam harus diisi'
                ],
                'id_buku' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'id buku harus diisi'
                    ]
                ],
                'tgl_kembali' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'tanggal kembali harus diisi'
                    ]
                ],
                'tgl_dikembalikan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'tanggal dikembalikan harus diisi'
                    ]
                ],

                'terlambat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'terlambat harus diisi'
                    ]
                ],

                'denda' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'denda harus diisi'
                    ]
                ],
            ]
        ])) {
            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('create/' . $id)->withInput();
        }
        // Hitung selisih hari pengembalian
        $hari = ((strtotime($this->request->getPost('tgl_dikembalikan')) - strtotime($this->request->getPost('tgl_kembali'))) / (60 * 60 * 24));
        if ($hari > 0) {
            //hitung jumlah dennda jika terlambat lebih dari 0
            $denda = 500 * $hari;
            $terlambat = $hari;
        }
        //jika terlambat korang dari 0 maka terlambat & jumlah denda dianggap 0 
        else {
            $terlambat = 0;
            $denda = 0;
        }
        $denda;
        $status = 0;

        $data = array(
            'id_pinjam'           => $this->request->getPost('id_pinjam'),
            'id_anggota'          => $this->request->getPost('id_anggota'),
            'tgl_dikembalikan'    => $this->request->getPost('tgl_dikembalikan'),
            'id_buku'             => $this->request->getPost('id_buku'),
            'terlambat'           => $terlambat,
            'denda'               => $denda,
            'total_buku'          => $this->request->getPost('total_buku')
        );

        $data1 = array(
            'status_pinjam'              => $status
        );

        $simpan = array(
            $this->KembaliModel->insertKembali($data),
            $this->KembaliModel->updatePinjam($data1, $id)
        );
        if ($simpan) {

            session()->setFlashdata('success', 'Data pengembalian Berhasil Ditambah');
            return redirect()->to(base_url('Kembali'));
        }
    }

    public function detail($id)
    {
        $data = [
            'tittle'  => 'Detail Data Pengembalian',
            'kembali' => $this->KembaliModel->getKembali($id)->getRowArray()
        ];
        echo view('admin/kembali/detail', $data);
    }


    public function delete($id)
    {
        $hapus = $this->KembaliModel->deleteKembali($id);

        if ($hapus) {
            session()->setFlashdata('warning', 'Delete pengembalian sukses');
            return redirect()->to(base_url('Kembali'));
        }
    }
}
