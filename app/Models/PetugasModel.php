<?php

namespace App\Models;

use CodeIgniter\Model;

class PetugasModel extends Model
{
    protected $table = 'petugas';

    public function getPetugas($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_petugas' => $id]);
        }
    }

    public function insertPetugas($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePetugas($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_petugas' => $id]);
    }

    public function deletePetugas($id)
    {
        return $this->db->table($this->table)->delete(['id_petugas' => $id]);
    }

    public function search($keyword)
    {
        return $this->table('petugas')->like('nama_petugas', $keyword)->orLike('alamat', $keyword)->orLike('username', $keyword);
    }
}
