<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Home extends BaseController
{
	public function index()
	{
		echo view('home/home');
	}

	public function katalog()
	{
		$currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') : 1;
		$model = new BukuModel();
		$keyword = $this->request->getVar('keyword');
		if ($keyword) {
			$model->search($keyword);
		} else {
			$buku = $model;
		}
		$data = [
			'buku'  => $model->paginate(5, 'buku'),
			'pager' => $model->pager,
			'currentPage' => $currentPage
		];
		echo view('home/katalog', $data);
	}

	//--------------------------------------------------------------------

}
