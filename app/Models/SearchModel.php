<?php

namespace App\Models;

use CodeIgniter\Model;


class SearchModel extends Model
{
    protected $table = 'anggota';

    public function getAnggota()
    {
        return $this->getWhere('nama_anggota');
    }
}
