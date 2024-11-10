<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'home::indexkls2',['filter' =>'auth_login']);
$routes->get('/register', 'home::showRegisterForm'); // Menampilkan formulir pendaftaran
$routes->post('/register', 'home::register'); // Menangani proses pendaftaran

$routes->post('/home/register', 'home::register');
$routes->get('/success', 'Home::success');

$routes->get('/dashboard2', 'Home::indexmtkl4');
$routes->get('/dashboard3', 'Home::dashboard3'); 

$routes->get('/tables.db', 'Home::tables_db');
$routes->get('/dt_user', 'Home::dt_user');
$routes->get('/logout', 'Home::logout_ac');
$routes->post('val/login', 'Home::val_user');

$routes->get('/gaji', 'gaji::indexkls', ['filter' => 'auth_login']);
$routes->get('/gaji', 'gaji::indexkls2', ['filter' => 'auth_login']);
$routes->get('/gaji', 'gaji::keranjang', ['filter' => 'auth_login']);

$routes->get('indexkls', 'gaji::indexkls', ['filter' => 'auth_login']);
$routes->get('indexkls2', 'gaji::indexkls2', ['filter' => 'auth_login']);
$routes->get('keranjang', 'gaji::keranjang', ['filter' => 'auth_login']);

$routes->get('buku', 'gaji::indexkls', ['filter' => 'auth_login']);

$routes->get('tambahgaji', 'gaji::tambahgaji', ['filter' => 'auth_login']);

// app/Config/Routes.php
$routes->get('gaji/tambahgaji', 'Gaji::tambahgaji');

$routes->post('gaji/view_perbulan', 'gaji::view_perbulan');

$routes->get('view_perbulan', 'gaji::view_perbulan');
$routes->post('/gaji/simpan', 'gaji::simpan');
$routes->get('/gaji/edit/(:num)', 'gaji::edit/$1');
$routes->get('/gaji/edit2/(:num)', 'gaji::edit2/$1');
$routes->post('/gaji/update/(:num)', 'gaji::update/$1');
$routes->get('/gaji/delete/(:num)', 'gaji::delete/$1');

$routes->get('/transaksi', 'transaksi::indexmtkl', ['filter' => 'auth_login']);
$routes->get('indexmtkl', 'transaksi::indexmtkl', ['filter' => 'auth_login']);

$routes->get('/transaksi', 'transaksi::indexmtkl3', ['filter' => 'auth_login']);
$routes->get('indexmtkl3', 'transaksi::indexmtkl3', ['filter' => 'auth_login']);

$routes->get('/transaksi', 'transaksi::indexmtkl4', ['filter' => 'auth_login']);
$routes->get('indexmtkl4', 'transaksi::indexmtkl4', ['filter' => 'auth_login']);


$routes->get('buku', 'transaksi::indexmtkl', ['filter' => 'auth_login']);
$routes->get('tambahmtkl', 'transaksi::tambahmtkl', ['filter' => 'auth_login']);
$routes->get('tambahmtkl2', 'transaksi::tambahmtkl2', ['filter' => 'auth_login']);
$routes->post('/transaksi/simpan', 'transaksi::simpan');
$routes->post('/transaksi/simpan2', 'transaksi::simpan2');

$routes->get('ulasan', 'transaksi::ulasan', ['filter' => 'auth_login']);

$routes->get('/transaksi/edit/(:num)', 'transaksi::edit/$1');


$routes->post('transaksi/update/(:num)', 'transaksi::update/$1');
$routes->get('/transaksi/delete/(:num)', 'transaksi::delete/$1');
$routes->get('/transaksi/(:any)', 'transaksi::details/$1');

$routes->post('transaksi/indexmtkl', 'transaksi::indexmtkl');

$routes->post('/upload/process', 'upload::process');
// routes.php

$routes->get('/gaji/upload', 'gaji::upload', ['filter' => 'auth_login']);
$routes->post('/transaksi/konfirmasi/(:num)', 'Transaksi::konfirmasi/$1');

$routes->get('indexmtkl2', 'transaksi::indexmtkl2', ['filter' => 'auth_login']);
$routes->get('indexpakaian', 'transaksi::indexpakaian', ['filter' => 'auth_login']);
$routes->get('indexsepatu', 'transaksi::indexsepatu', ['filter' => 'auth_login']);
$routes->get('indexaksesoris', 'transaksi::indexaksesoris', ['filter' => 'auth_login']);


$routes->get('/transaksi/generatepdf', 'Transaksi::generatepdf');

$routes->get('/gaji/details/(:num)', 'gaji::details/$1');