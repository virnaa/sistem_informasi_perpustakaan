<?php

namespace App\Controllers;

use App\Models\DashboardModel;

class Dashboard extends BaseController
{
    public function __construct()
    {

        $this->cek_login();
        $this->DashboardModel = new DashboardModel();
    }

    public function index()
    {
        if ($this->cek_login() == FALSE) {
            session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
            return redirect()->to('/auth/login');
        }

        $data = [
            'tittle'        => 'Perpustakaan MA Al-Irfan',
            'total_pinjam'  => $this->DashboardModel->getCountPinjam(),
            'total_buku'    => $this->DashboardModel->getCountBuku(),
            'total_anggota' => $this->DashboardModel->getCountAnggota(),
            'total_kembali' => $this->DashboardModel->getCountKembali(),
            'latest_pinjam' => $this->DashboardModel->getLatestPinjam()
        ];
        $chart['grafik'] = $this->DashboardModel->getGrafik();

        echo view('admin/dashboard', $data);
        echo view('admin/footer', $chart);
    }

    public function anggota()
    {
        $data['tittle'] = 'Halaman Anggota';
        return view('anggota/dashboard', $data);
    }
}
