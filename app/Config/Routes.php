<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
$routes->get('/masuk', 'adminController::index');// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/panel-admin', 'Home::indexAdmin');
$routes->get('/registrasi', 'registrasiController::index');
$routes->get('/admin/cetak-laporan', 'CetaklaporanController::index',['filter' => 'role:admin']);
$routes->get('/admin/jenis', 'JenisController::index',['filter' => 'role:admin']);
$routes->get('/admin/laporan', 'LaporanController::index',['filter' => 'role:admin']);
$routes->get('/admin/pegawai', 'PegawaiController::index',['filter' => 'role:admin']);
$routes->get('/admin/pelanggan', 'PelangganController::index',['filter' => 'role:admin']);
$routes->get('/admin/pemesanan', 'PemesananController::index',['filter' => 'role:admin']);
$routes->get('/admin/profile', 'ProfileController::index',['filter' => 'role:admin']);
$routes->get('/admin/transaksi', 'TransaksiController::index',['filter' => 'role:admin']);
$routes->get('/member/pesan', 'PesanController::index',['filter' => 'role:member,admin']);
$routes->get('/member/transaksi', 'MemberTransaksiController::index',['filter' => 'role:member,admin']);

$routes->post('authorization/login','adminController::CekLogin');
$routes->get('authorization/logout','adminController::Logout');
$routes->post('authorization/simpan','registrasiController::Registrasi');
$routes->post('admin/profile/simpan','ProfileController::svProfil');
$routes->post('admin/pegawai/simpan','PegawaiController::svBagian');
$routes->post('admin/pegawai/edit/(:num)','PegawaiController::updateBagian/$1');
$routes->post('admin/pegawai/delete/(:num)','PegawaiController::deletePegawai/$1');
$routes->post('admin/pelanggan/simpan','PelangganController::simpanPelanggan');
$routes->post('admin/jenis/update/(:num)','JenisController::updateJenis/$1');
$routes->post('admin/jenis/simpan','JenisController::svJenis');
$routes->post('admin/jenis/delete/(:num)','JenisController::delJenis/$1');
$routes->post('admin/transaksi/simpan','TransaksiController::svTransaksi');
$routes->post('/pesan','PesanController::svPesan');
$routes->post('admin/pemesanan/edit/(:num)','PemesananController::updateStatusPending/$1');
$routes->post('admin/pemesanan/editProses/(:num)','PemesananController::updateStatusProses/$1');
$routes->post('/transaksi','TransaksiController::svTransaksi');
$routes->post('admin/pelanggan/edit/(:num)','PelangganController::updatePelanggan/$1');
$routes->post('admin/pelanggan/delete/(:num)','PelangganController::delPelanggan/$1');
$routes->post('admin/pemesanan/delete/(:num)','PemesananController::delPesanan/$1');



/*
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
