<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PetugasModel;
use App\Models\UserModel;

class Petugas extends BaseController
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
        $currentPage = $this->request->getVar('page_petugas') ? $this->request->getVar('page_petugas') : 1;

        $model = new PetugasModel();
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $model->search($keyword);
        } else {
            $petugas = $model;
        }
        $data = [
            'tittle' => 'Data Petugas',
            'petugas'  => $model->paginate(5, 'petugas'),
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];


        echo view('admin/petugas/petugas', $data);
    }

    public function create()
    {

        $data['tittle'] = 'Tambah Peminjaman';
        return view('admin/petugas/create', $data);
    }
    public function store()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }
        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama petugas harus diisi',
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[petugas.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis kelamin harus diisi',
                ]
            ],
            'img_petugas' => [
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
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'alamat'           => $this->request->getPost('alamat'),
            'no_tlp'           => $this->request->getPost('no_tlp'),
            'username'         => $this->request->getPost('username'),
            'password2'        => $this->request->getPost('password'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'img_petugas'      => $namaFoto,
            'level'            => "admin",
            'status'           => "active"
        );

        $model = new PetugasModel();
        $simpan = $model->insertpetugas($data);
        if ($simpan) {
            session()->setFlashdata('success', 'Data petugas Berhasil Ditambah');
            return redirect()->to(base_url('Petugas'));
        }
    }


    public function detail($id)
    {
        $model = new PetugasModel();
        $data = [
            'tittle'  => 'Detail Data Petugas',
            'petugas' => $model->getPetugas($id)->getRowArray()
        ];
        echo view('admin/petugas/detail', $data);
    }


    public function edit($id)
    {
        $model = new PetugasModel();
        $data = [
            'tittle'  => 'Edit Data Petugas',
            'petugas' => $model->getpetugas($id)->getRowArray()
        ];
        echo view('admin/petugas/edit', $data);
    }

    public function update()
    {

        $id = $this->request->getPost('id_petugas');

        if (!$this->validate([
            'nama_petugas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama petugas harus diisi'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'username harus diisi'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'password harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama petugas harus diisi'
                ]
            ],
            'img_petugas' => [
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
            'nama_petugas'     => $this->request->getPost('nama_petugas'),
            'jenis_kelamin'    => $this->request->getPost('jenis_kelamin'),
            'alamat'           => $this->request->getPost('alamat'),
            'no_tlp'           => $this->request->getPost('no_tlp'),
            'username'         => $this->request->getPost('username'),
            'password2'        => $this->request->getPost('password'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'img_petugas'      => $namaFoto
        );


        $model = new PetugasModel();
        $ubah = $model->updatePetugas($data, $id);
        if ($ubah) {
            session()->setFlashdata('info', 'Update petugas sukses');
            return redirect()->to(base_url('Petugas'));
        }
    }


    public function delete($id)
    {
        $model = new PetugasModel();
        $hapus = $model->deletePetugas($id);

        // if ($this->request->getPost('img') != 'default.png') {
        //     unlink('img/' . $this->request->getVar('img'));
        //     unlink(FCPATH . 'img' . $this->request->getPost('img'));
        //     unlink('img/' . $this->request->getPost('img'));
        // }

        if ($hapus) {
            session()->setFlashdata('warning', 'Delete petugas sukses');
            return redirect()->to(base_url('petugas'));
        }
    }
}
