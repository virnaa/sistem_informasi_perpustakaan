<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';

    public function getAnggota($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_anggota' => $id]);
        }
    }

    public function insertAnggota($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateAnggota($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_anggota' => $id]);
    }

    public function deleteAnggota($id)
    {
        return $this->db->table($this->table)->delete(['id_anggota' => $id]);
    }

    public function search($keyword)
    {
        return $this->table('anggota')->like('NIS', $keyword)->orLike('nama_anggota', $keyword)->orLike('kelas', $keyword);
    }
}
