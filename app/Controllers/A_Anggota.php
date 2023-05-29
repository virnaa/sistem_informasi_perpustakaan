<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnggotaModel;
use App\Models\BukuModel;
use App\Models\KembaliModel;


class A_Anggota extends BaseController
{
    public function __construct()
    {

        $this->cek_login();
        $this->KembaliModel = new KembaliModel();
    }


    public function create()
    {
        return view('auth/daftar');
    }

    public function store()
    {

        if (!$this->validate([
            'NIS' => [
                'rules' => 'required|is_unique[anggota.NIS]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[anggota.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'img_anggota' => [
                'rules' => 'is_image[img]|mime_in[img, image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'is_image' => 'file yang dipilih bukan gambar',
                    'mime_in' => 'file yang dipilih bukan gambar'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/daftar')->withInput();
        }

        $fileSampul = $this->request->getFile('img');

        if ($fileSampul->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $fileSampul->getName();
            $fileSampul->move('img', $namaFoto);
        }

        $data = array(
            'NIS'              => $this->request->getPost('NIS'),
            'nama_anggota'     => $this->request->getPost('nama_anggota'),
            'kelas'            => $this->request->getPost('kelas'),
            'jk_anggota'       => $this->request->getPost('jk_anggota'),
            'alamat'           => $this->request->getPost('alamat'),
            'tlp_anggota'      => $this->request->getPost('tlp_anggota'),
            'username'         => $this->request->getPost('username'),
            'password2'        => $this->request->getPost('password'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'img_anggota'      => $namaFoto,
            'level'            => "anggota",
            'status'           => "active"
        );

        $model = new AnggotaModel();
        $simpan = $model->insertAnggota($data);
        if ($simpan) {
            session()->setFlashdata('info', 'Berhasil Daftar Anggota');
            return redirect()->to(base_url('auth/login'));
        }
    }


    public function detail($id)
    {
        $id = session()->get('id_anggota');
        $model = new AnggotaModel();
        $data = [
            'anggota' => $model->getAnggota($id)->getRowArray(),
            'tittle' => 'Detail Data Anggota'
        ];
        echo view('anggota/profil/profil', $data);
    }

    public function edit($id)
    {

        $model = new AnggotaModel();
        $data = [
            'anggota' => $model->getAnggota($id)->getRowArray(),
            'tittle' => 'Edit Data Anggota'
        ];
        echo view('anggota/profil/edit', $data);
    }

    public function update()
    {

        $id = $this->request->getPost('id_anggota');

        if (!$this->validate([
            'NIS' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'img_anggota' => [
                'rules' => 'is_image[img]|mime_in[img, image/jpg,image/jpeg,image/gif,image/png]',
                'errors' => [
                    'is_image' => 'file yang dipilih bukan gambar',
                    'mime_in' => 'file yang dipilih bukan gambar'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('anggota/profil/edit/' . $id)->withInput();
        }

        $fileSampul = $this->request->getFile('img');

        if ($fileSampul->getError() == 4) {
            $namaFoto = $this->request->getPost('imgLama');
        } else {
            $namaFoto = $fileSampul->getName();
            $fileSampul->move('img', $namaFoto);
        }

        $data = array(
            'NIS'              => $this->request->getPost('NIS'),
            'nama_anggota'     => $this->request->getPost('nama_anggota'),
            'kelas'            => $this->request->getPost('kelas'),
            'jk_anggota'       => $this->request->getPost('jk_anggota'),
            'alamat'           => $this->request->getPost('alamat'),
            'tlp_anggota'      => $this->request->getPost('tlp_anggota'),
            'username'         => $this->request->getPost('username'),
            'password2'        => $this->request->getPost('password'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'img_anggota'      => $namaFoto
        );

        $model = new AnggotaModel();
        $ubah = $model->updateAnggota($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Edit profil sukses');
            return redirect()->to(base_url('anggota/profil/'. $id));
        }
    }


    public function buku()
    {

        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;

        $model = new BukuModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $model->search($keyword);
        } else {
            $buku = $model;
        }
        $data = [
            'tittle' => 'Data Buku',
            'buku'  => $model->paginate(5, 'buku'),
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];

        echo view('anggota/buku/buku', $data);
    }

    public function detail_buku($id)
    {
        $model = new BukuModel();
        $data = [
            'tittle' => 'Detail Data Buku',
            'buku'     => $model->getBuku($id)->getRowArray()
        ];
        echo view('anggota/buku/detail', $data);
    }

    public function kembali()
    {
        if ($this->cek_anggota() == FALSE) {
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

        $id = session()->get('id_anggota');

        $data = [
            'tittle' => 'Data Pengembalian',
            'kembali'  => $this->KembaliModel
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->where('anggota.id_anggota', $id)
                ->orderBy('id_kembali', 'DESC')
                ->paginate(5, 'kembali'),
            'pager' => $this->KembaliModel->pager,
            'currentPage' => $currentPage
        ];
        echo view('anggota/kembali/kembali', $data);
    }


    public function detail_kembali($id)
    {
        $data = [
            'tittle'  => 'Detail Data Pengembalian',
            'kembali' => $this->KembaliModel->getKembali($id)->getRowArray()
        ];
        echo view('anggota/kembali/detail', $data);
    }
}
