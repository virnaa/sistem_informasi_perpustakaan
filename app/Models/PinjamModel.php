<?php

namespace App\Models;

use CodeIgniter\Model;

class PinjamModel extends Model
{
    protected $table = 'pinjam';

    public function getPinjam($id = false)
    {
        if ($id === false) {
            return $this->table('pinjam')
                ->join('anggota', 'anggota.id_anggota = pinjam.id_anggota')
                ->join('buku', 'buku.id_buku = pinjam.id_buku')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('pinjam')
                ->join('anggota', 'anggota.id_anggota = pinjam.id_anggota')
                ->join('buku', 'buku.id_buku = pinjam.id_buku')
                ->getWhere(['id_pinjam' => $id]);
        }
    }

    public function insertPinjam($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePinjam($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_pinjam' => $id]);
    }

    public function deletePinjam($id)
    {
        return $this->db->table($this->table)->delete(['id_pinjam' => $id]);
    }

    public function search($keyword)
    {
        return $this->table('pinjam')
            ->like('nama_anggota', $keyword)->orLike('judul', $keyword)->orLike('tgl_pinjam', $keyword)->orLike('tgl_kembali', $keyword)->orLike('ISBN', $keyword)->orLike('NIS', $keyword);
    }
}
