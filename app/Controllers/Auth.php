<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    protected $helper = [];

    public function __construct()
    {
        helper(['form']);
        $this->cek_login();
        $this->AuthModel = new AuthModel();
    }

    public function index()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login_admin');
    }

    public function login()
    {
        if ($this->cek_login() == TRUE) {
            return redirect()->to('/dashboard');
        }
        echo view('auth/login_admin');
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
            return redirect()->to('/auth/login_admin');
        } else {

            $cek_login = $this->AuthModel->cek_login($username);

            // username didapatkan
            if ($cek_login == TRUE) {

                // jika username dan password cocok
                if ($pass = $cek_login['password']) {
                    session()->set('username', $cek_login['username']);
                    session()->set('nama', $cek_login['nama_petugas']);
                    session()->set('img', $cek_login['img_petugas']);
                    session()->set('level', $cek_login['level']);
                    session()->set('status', $cek_login['status']);

                    return redirect()->to('/dashboard');
                    // username cocok, tapi password salah
                } else {
                    session()->setFlashdata('errors', ['' => 'Password yang Anda masukan salah']);
                    return redirect()->to('/auth/login_admin');
                }
            } else {
                // username tidak cocok / tidak terdaftar
                session()->setFlashdata('errors', ['' => 'username yang Anda masukan tidak terdaftar']);
                return redirect()->to('/auth/login_admin');
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth/login');
    }
}
