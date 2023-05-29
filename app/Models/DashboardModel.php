<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'pinjam';

    // hitung total data pada transaction
    public function getCountPinjam()
    {
        return $this->db->table("pinjam")->countAll();
    }

    // hitung total data pada category
    public function getCountBuku()
    {
        return $this->db->table("buku")->countAll();
    }

    // hitung total data pada product
    public function getCountAnggota()
    {
        return $this->db->table("anggota")->countAll();
    }

    // hitung total data pada user
    public function getCountKembali()
    {
        return $this->db->table("kembali")->countAll();
    }

    public function getGrafik()
    {
        $query = $this->db->query("SELECT id_buku, MONTHNAME(tgl_pinjam) as month, COUNT(id_pinjam) as total FROM pinjam GROUP BY MONTHNAME(tgl_pinjam) ORDER BY MONTH(tgl_pinjam)");
        $hasil = [];
        if (!empty($query)) {
            foreach ($query->getResultArray() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function getLatestPinjam()
    {
        return $this->table('pinjam')
            ->join('anggota', 'anggota.id_anggota = pinjam.id_anggota')
            ->join('buku', 'buku.id_buku = pinjam.id_buku')
            ->orderBy('pinjam.id_pinjam', 'desc')
            ->limit(5)
            ->get()
            ->getResultArray();
    }
}
