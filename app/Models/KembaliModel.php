<?php

namespace App\Models;

use CodeIgniter\Model;

class KembaliModel extends Model
{
    protected $table = 'kembali';

    public function getKembali($id = false)
    {
        if ($id === false) {
            return $this->table('kembali')
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->get()
                ->getResultArray();
        } else {

            return $this->table('kembali')
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->getWhere(['id_kembali' => $id]);
        }
    }


    public function kembaliAnggota($id = false)
    {
        $id_anggota = $this->session()->get('id_anggota');
        if ($id === false) {
            return $this->table('kembali')
                ->where('anggota.id_anggota', $id_anggota)
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->get()
                ->getResultArray();
        } else {

            return $this->table('kembali')
                ->where('anggota.id_anggota', $id_anggota)
                ->join('pinjam', 'pinjam.id_pinjam = kembali.id_pinjam')
                ->join('anggota', 'anggota.id_anggota = kembali.id_anggota')
                ->join('buku', 'buku.id_buku = kembali.id_buku')
                ->getWhere(['id_kembali' => $id]);
        }
    }


    public function insertKembali($data)
    {
        return $this->db->table($this->table)->insert($data);
    }

    public function updatePinjam($data1, $id)
    {
        return $this->db->table('pinjam')->update($data1, ['id_pinjam' => $id]);
    }
    public function deleteKembali($id)
    {
        return $this->db->table($this->table)->delete(['id_kembali' => $id]);
    }

    public function search($keyword)
    {
        return $this->table('kembali')
            ->like('nama_anggota', $keyword)->orLike('judul', $keyword)->orLike('tgl_pinjam', $keyword)->orLike('tgl_kembali', $keyword)->orLike('tgl_dikembalikan', $keyword)->orLike('terlambat', $keyword)->orLike('denda', $keyword);
    }
}
