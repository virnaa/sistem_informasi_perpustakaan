<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnggotaModel;
use App\Models\UserModel;

class Anggota extends BaseController
{
    public function __construct()
    {

        $this->cek_login();
    }

    public function index()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        $currentPage = $this->request->getVar('page_anggota') ? $this->request->getVar('page_anggota') : 1;
        $model = new AnggotaModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $model->search($keyword);
        } else {
            $anggota = $model;
        }
        $data = [
            'tittle' => 'Data Anggota',
            'anggota' => $model->paginate(5, 'anggota'),
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];


        echo view('admin/anggota/anggota', $data);
    }

    public function create()
    {

        $data['tittle'] = 'Tambah Data Anggota';
        return view('admin/anggota/create', $data);
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
                    'required' => '{field} harus diisi',
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
            return redirect()->to('create')->withInput();
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
            session()->setFlashdata('success', 'Data Anggota Berhasil Ditambah');
            return redirect()->to(base_url('Anggota'));
        }
    }


    public function detail($id)
    {

        $model = new AnggotaModel();
        $data = [
            'anggota' => $model->getAnggota($id)->getRowArray(),
            'tittle' => 'Detail Data Anggota'
        ];
        echo view('admin/anggota/detail', $data);
    }

    public function edit($id)
    {

        $model = new AnggotaModel();
        $data = [
            'anggota' => $model->getAnggota($id)->getRowArray(),
            'tittle' => 'Edit Data Anggota'
        ];
        echo view('admin/anggota/edit', $data);
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
            'password' => [
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
            return redirect()->to('edit/' . $id)->withInput();
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
            session()->setFlashdata('info', 'Update anggota sukses');
            return redirect()->to(base_url('Anggota'));
        }
    }


    public function delete($id)
    {
        $model = new AnggotaModel();
        $hapus = $model->deleteAnggota($id);

        if ($this->request->getPost('img') != 'default.png') {
            unlink('img/' . $this->request->getVar('img'));
            unlink(FCPATH . 'img' . $this->request->getPost('img'));
            unlink('img/' . $this->request->getPost('img'));
        }

        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Anggota sukses');
            return redirect()->to(base_url('anggota'));
        }
    }
}
