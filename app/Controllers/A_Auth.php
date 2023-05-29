<?php

namespace App\Controllers;

use App\Models\A_AuthModel;

class A_Auth extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        $this->cek_anggota();
        $this->A_AuthModel = new A_AuthModel();
    }

    public function index()
    {
        if ($this->cek_anggota() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }

    public function login()
    {
        if ($this->cek_anggota() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login');
    }

    public function proses_login()
    {
        $validation =  \Config\Services::validation();

        $username  = $this->request->getPost('username');
        $pass   = $this->request->getPost('password');

        $data = [
            'username' => $username,
            'password' => $pass
        ];

        if ($validation->run($data, 'authlogin') == FALSE) {
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to('/auth/login');
        } else {

            $cek_anggota = $this->A_AuthModel->cek_anggota($username);

            // username didapatkan
            if ($cek_anggota == TRUE) {

                // jika username dan password cocok
                if ($pass = $cek_anggota['password']) {
                    session()->set('id_anggota', $cek_anggota['id_anggota']);
                    session()->set('username', $cek_anggota['username']);
                    session()->set('nama', $cek_anggota['nama_anggota']);
                    session()->set('img', $cek_anggota['img_anggota']);
                    session()->set('level', $cek_anggota['level']);
                    session()->set('status', $cek_anggota['status']);

                    return redirect()->to('/dashboard');
                    // username cocok, tapi password salah
                } else {
                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah']);
                    return redirect()->to('/auth/login');
                }
            } else {
                // username tidak cocok / tidak terdaftar
                session()->setFlashdata('errors', ['' => 'username yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth/login');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
