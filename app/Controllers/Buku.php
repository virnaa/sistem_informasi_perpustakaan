<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BukuModel;

class Buku extends BaseController
{
	public function __construct()
	{

		$this->cek_login();
	}

	public function index()
	{
		if ($this->cek_login() == FALSE) {
			session()->setFlashdata('error_login', 'Silahkan login terlebih dahulu untuk mengakses data');
			return redirect()->to('/auth/login');
		}

		$currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;

		$model = new BukuModel();
		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$model->search($keyword);
		} else {
			$buku = $model;
		}
		$data = [
			'tittle' => 'Data Buku',
			'buku'  => $model->paginate(5, 'buku'),
			'pager' => $model->pager,
			'currentPage' => $currentPage
		];

		echo view('admin/buku/buku', $data);
	}

	public function create()
	{

		$data['tittle'] = 'Tambah Data Buku';
		return view('admin/buku/create', $data);
	}

	public function store()
	{

		if (!$this->validate([
			'judul' => [
				'rules' => 'required|is_unique[buku.judul]',
				'errors' => [
					'required' => '{field} buku harus diisi',
					'is_unique' => '{field} buku sudah terdaftar'
				]
			],
			'tahun_terbit' => [
				'rules' => 'numeric',
				'errors' => [
					'numeric' => 'tahun terbit harus berisi angka'
				]
			],
			'stok' => [
				'rules' => 'numeric',
				'errors' => [
					'numeric' => 'stok harus berisi angka'
				]
			],
			'img' => [
				'rules' => 'is_image[img]|mime_in[img, image/jpg,image/jpeg,image/gif,image/png]',
				'errors' => [
					'is_image' => 'file yang dipilih bukan gambar',
					'mime_in' => 'file yang dipilih bukan gambar'
				]
			]
		])) {
			$validation =  \Config\Services::validation();
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to('create')->withInput();
		}

		$fileSampul = $this->request->getFile('img');

		if ($fileSampul->getError() == 4) {
			$namaSampul = 'default.png';
		} else {
			$namaSampul = $fileSampul->getName();
			$fileSampul->move('img', $namaSampul);
		}

		$data = array(
			'judul'    	 	 => $this->request->getPost('judul'),
			'ISBN'   		 => $this->request->getPost('ISBN'),
			'kategori'   	 => $this->request->getPost('kategori'),
			'pengarang'      => $this->request->getPost('pengarang'),
			'penerbit'     	 => $this->request->getPost('penerbit'),
			'tahun_terbit'   => $this->request->getPost('tahun_terbit'),
			'kategori'     	 => $this->request->getPost('kategori'),
			'stok'    		 => $this->request->getPost('stok'),
			'rak'     		 => $this->request->getPost('rak'),
			'deskripsi'      => $this->request->getPost('deskripsi'),
			'img'     		 => $namaSampul
		);

		$model = new BukuModel();
		$simpan = $model->insertBuku($data);
		if ($simpan) {
			session()->setFlashdata('success', 'Data Buku Berhasil Ditambah');
			return redirect()->to(base_url('Buku'));
		}
	}

	public function detail($id)
	{
		$model = new BukuModel();
		$data = [
			'tittle' => 'Detail Data Buku',
			'buku'	 => $model->getBuku($id)->getRowArray()
		];
		echo view('admin/buku/detail', $data);
	}


	public function edit($id)
	{
		$model = new BukuModel();
		$data = [
			'tittle' => 'Edit Data Buku',
			'buku'	 => $model->getBuku($id)->getRowArray()
		];
		echo view('admin/buku/edit', $data);
	}

	public function update()
	{
		$id = $this->request->getPost('id_buku');

		if (!$this->validate([
			'judul' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} buku harus diisi.',
				]

			],
			'img' => [
				'rules' => 'is_image[img]|mime_in[img, image/jpg,image/jpeg,image/gif,image/png]',
				'errors' => [
					'is_image' => 'file yang dipilih bukan gambar',
					'mime_in' => 'file yang dipilih bukan gambar'
				]
			]
		])) {
			$validation =  \Config\Services::validation();
			session()->setFlashdata('inputs', $this->request->getPost());
			session()->setFlashdata('errors', $validation->getErrors());
			return redirect()->to('edit/' . $id)->withInput();
		}

		$fileSampul = $this->request->getFile('img');

		if ($fileSampul->getError() == 4) {
			$namaSampul = $this->request->getPost('imgLama');
		} else {
			$namaSampul = $fileSampul->getName();
			$fileSampul->move('img', $namaSampul);
		}

		$data = array(
			'id_buku' 		 => $this->request->getPost('id_buku'),
			'judul'    	 	 => $this->request->getPost('judul'),
			'ISBN'   		 => $this->request->getPost('ISBN'),
			'kategori'   	 => $this->request->getPost('kategori'),
			'pengarang'      => $this->request->getPost('pengarang'),
			'penerbit'     	 => $this->request->getPost('penerbit'),
			'tahun_terbit'   => $this->request->getPost('tahun_terbit'),
			'kategori'     	 => $this->request->getPost('kategori'),
			'stok'    		 => $this->request->getPost('stok'),
			'deskripsi'      => $this->request->getPost('deskripsi'),
			'img'     		 => $namaSampul
		);

		$model = new BukuModel();
		$ubah = $model->updateBuku($data, $id);
		if ($ubah) {
			session()->setFlashdata('info', 'Update buku sukses');
			return redirect()->to(base_url('Buku'));
		}
	}


	public function delete($id)
	{
		$model = new BukuModel();
		$hapus = $model->deleteBuku($id);

		// if ($this->request->getPost('img') != 'default.png') {
		// 	unlink('img' . $this->request->getVar('img'));
		// 	unlink(FCPATH . 'img' . $this->request->getPost('img'));
		// 	unlink('img' . $this->request->getPost('img'));
		// }

		if ($hapus) {
			session()->setFlashdata('warning', 'Delete Buku sukses');
			return redirect()->to(base_url('Buku'));
		}
	}
}
