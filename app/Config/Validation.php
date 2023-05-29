<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $buku = [
		'judul'     => 'required',
	];

	public $buku_errors = [
		'judul' => [
			'required'    => 'Judul buku wajib diisi.'
		]
	];
	public $authlogin = [
		'username'         => 'required',
		'password'      => 'required'
	];

	public $authlogin_errors = [
		'username' => [
			'required'  => 'username wajib diisi.'
		],
		'password' => [
			'required'  => 'Password wajib diisi.'
		]
	];
	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
