<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'buku';

    public function getBuku($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_buku' => $id]);
        }
    }

    public function insertBuku($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updateBuku($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_buku' => $id]);
    }

    public function deleteBuku($id)
    {
        return $this->db->table($this->table)->delete(['id_buku' => $id]);
    }

    public function search($keyword)
    {
        return $this->table('buku')->like('judul', $keyword)->orLike('ISBN', $keyword)->orLike('kategori', $keyword)->orLike('penerbit', $keyword)->orLike('pengarang', $keyword)->orLike('tahun_terbit', $keyword);
    }

    public function getBuku_id($id = false)
    {
        if ($id === false) {
            return $this->table('buku')
                ->join('user', 'user.id_pengguna = buku.id_anggota')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('buku')
                ->join('user', 'user.id_pengguna = buku.id_anggota')
                ->getWhere(['id_buku' => $id]);
        }
    }
}
