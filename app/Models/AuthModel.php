<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = "petugas";

    public function cek_login($username)
    {
        $query = $this->table('petugas')
            ->where('username', $username)
            ->countAll();

        if ($query >  0) {
            $hasil = $this->table('petugas')
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
