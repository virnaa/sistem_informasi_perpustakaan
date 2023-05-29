<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/', 'Home::index');

$routes->get('/katalog', 'Home::katalog');
$routes->post('/katalog', 'Home::katalog');

$routes->get('auth/login_admin', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');
$routes->get('auth/login', 'A_Auth::login');
$routes->post('anggota/auth/proses_login', 'A_Auth::proses_login');

$routes->get('auth/logout', 'Auth::logout');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('anggota/dashboard', 'Dashboard::anggota');

$routes->get('Buku', 'Buku::index');
$routes->post('Buku', 'Buku::index');
$routes->get('buku/create', 'Buku::create');
$routes->post('buku/store', 'Buku::store');
$routes->get('buku/edit/(:num)', 'Buku::edit/$1');
$routes->post('buku/update', 'Buku::update');
$routes->get('buku/delete/(:num)', 'Buku::delete/$1');
$routes->get('buku/detail/(:num)', 'Buku::detail/$1');


$routes->get('Anggota', 'Anggota::index');
$routes->post('Anggota', 'Anggota::index');
$routes->get('anggota/create', 'Anggota::create');
$routes->post('anggota/store', 'Anggota::store');
$routes->get('anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->post('anggota/update', 'Anggota::update');
$routes->get('anggota/delete/(:num)', 'Anggota::delete/$1');
$routes->get('anggota/detail/(:num)', 'Anggota::detail/$1');


$routes->get('Petugas', 'Petugas::index');
$routes->post('Petugas', 'Petugas::index');
$routes->get('petugas/create', 'Petugas::create');
$routes->post('petugas/store', 'Petugas::store');
$routes->get('petugas/edit/(:num)', 'Petugas::edit/$1');
$routes->post('petugas/update', 'Petugas::update');
$routes->get('petugas/delete/(:num)', 'Petugas::delete/$1');
$routes->get('petugas/detail/(:num)', 'Petugas::detail/$1');


$routes->get('Pinjam', 'Pinjam::index');
$routes->post('Pinjam', 'Pinjam::index');
$routes->get('pinjam/create', 'Pinjam::create');
$routes->post('pinjam/store', 'Pinjam::store');
$routes->get('pinjam/edit/(:num)', 'Pinjam::edit/$1');
$routes->post('pinjam/update', 'Pinjam::update');
$routes->get('pinjam/delete/(:num)', 'Pinjam::delete/$1');

$routes->get('kembali/create/(:num)', 'Kembali::create/$1');
$routes->get('Kembali', 'Kembali::index');
$routes->post('Kembali', 'Kembali::index');
$routes->post('kembali/store', 'Kembali::store');
$routes->get('kembali/edit/(:num)', 'Kembali::edit/$1');
$routes->post('kembali/update', 'Kembali::update');
$routes->get('kembali/delete/(:num)', 'Kembali::delete/$1');
$routes->get('kembali/detail/(:num)', 'Kembali::detail/$1');

$routes->get('daftar', 'A_Anggota::create');
$routes->post('a_anggota/store', 'A_Anggota::store');
$routes->get('anggota/edit/(:num)', 'Anggota::edit/$1');
$routes->post('anggota/update', 'Anggota::update');
$routes->get('anggota/delete/(:num)', 'Anggota::delete/$1');
$routes->get('anggota/detail/(:num)', 'Anggota::detail/$1');

$routes->get('anggota/buku', 'A_Anggota::buku');
$routes->post('anggota/buku', 'A_Anggota::buku');
$routes->get('anggota/buku/detail/(:num)', 'A_Anggota::detail_buku/$1');

$routes->get('anggota/pinjam', 'A_Pinjam::index');
$routes->post('anggota/pinjam', 'A_Pinjam::index');
$routes->get('anggota/pinjam/create', 'A_Pinjam::create');
$routes->post('anggota/pinjam/store', 'A_Pinjam::store');
$routes->get('anggota/pinjam/create/(:num)', 'A_Pinjam::create_buku/$1');
$routes->get('anggota/pinjam/edit/(:num)', 'A_Pinjam::edit/$1');
$routes->post('anggota/pinjam/update', 'A_Pinjam::update');
$routes->get('anggota/pinjam/delete/(:num)', 'A_Pinjam::delete/$1');
$routes->get('anggota/pinjam/detail/(:num)', 'A_Pinjam::detail/$1');

$routes->get('anggota/profil/(:num)', 'A_Anggota::detail/$1');
$routes->get('anggota/profil/edit/(:num)', 'A_Anggota::edit/$1');
$routes->post('anggota/profil/update', 'A_Anggota::update');


$routes->get('anggota/kembali', 'A_Anggota::kembali');
$routes->post('anggota/kembali', 'A_Anggota::kembali');
$routes->get('kembali/detail/(:num)', 'A_Anggota::detail_kembali/$1');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
