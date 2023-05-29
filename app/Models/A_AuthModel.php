<?php

namespace App\Models;

use CodeIgniter\Model;

class A_AuthModel extends Model
{
    protected $table = "anggota";

    public function cek_anggota($username)
    {
        $query = $this->table('anggota')
            ->where('username', $username)
            ->countAll();

        if ($query >  0) {
            $hasil = $this->table('anggota')
                ->where('username', $username)
                ->limit(1)
                ->get()
                ->getRowArray();
        } else {
            $hasil = array();
        }
        return $hasil;
    }
}
