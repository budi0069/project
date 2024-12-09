<?php

use CodeIgniter\Router\RouteCollection;
use DeepCopy\Filter\Filter;

/**
 * @var RouteCollection $routes
 */
//login dan register
$routes->get('/login', 'Login::index');
$routes->post('/login/action', 'Login::loginAction');
$routes->get('/auth/register', 'Register::index');
$routes->post('/register/process', 'Register::process');


// masyarakat
$routes->get('/', 'Home::index');
$routes->get('/tentang', 'Home::tentang');
$routes->get('/lapor', 'Home::lapor',['filter' => 'userfilter']);
$routes->post('/masyarakat_lapor', 'Home::masyarakat_lapor');
$routes->get('/masyarakat/laporan_saya', 'Home::laporan_saya');
$routes->get('/masyarakat/profil', 'Home::profil');
$routes->get('/masyarakat/logout', 'Login::logout');

// Admin Kelurahan
$routes->get('/admin_kelurahan', 'KelurahanCtrl::index');
$routes->get('/admin_kelurahan/notifikasi', 'KelurahanCtrl::notifikasi');
$routes->get('/admin_kelurahan/data_laporan', 'KelurahanCtrl::data_laporan');
$routes->get('/admin_kelurahan/rujukan', 'KelurahanCtrl::rujukan');
$routes->get('/admin_kelurahan/laporan', 'KelurahanCtrl::laporan');

// Admin DPMPPA
$routes->get('/admin', 'AdminCtrl::index',['filter' => 'adminfilter','userfilters']);
$routes->get('/admin/data_laporan', 'AdminCtrl::data_laporan');
$routes->get('/admin/data_laporan/tampilForm', 'AdminCtrl::tampilForm');
$routes->get('/admin/data_laporan/detail/(:any)', 'AdminCtrl::detail/$1');
$routes->post('/admin/data_laporan/tambahLaporan', 'AdminCtrl::tambahLaporan');
$routes->get('/admin/data_laporan/delete/(:any)', 'AdminCtrl::deleteLaporan/$1');
$routes->get('/admin/data_laporan/edit/(:any)', 'AdminCtrl::editLaporan/$1');
$routes->post('/admin/data_laporan/editLaporan/(:any)', 'AdminCtrl::update/$1');
$routes->get('/admin/penugasan', 'AdminCtrl::penugasan');
$routes->get('/admin/penugasan/kirim/(:any)', 'AdminCtrl::kirimPenugasan/$1');
$routes->get('/admin/logout', 'Login::logout');
$routes->get('/admin/notifikasi', 'AdminCtrl::notifikasi');
$routes->get('/admin/notifikasi/detail/(:any)', 'AdminCtrl::detailNotifikasi/$1');
$routes->get('admin/verifikasi/(:any)', 'AdminCtrl::verifikasi/$1');
$routes->post('admin/tolak/(:any)', 'AdminCtrl::tolak/$1');
$routes->get('admin/laporan', 'AdminCtrl::laporan');
$routes->get('admin/data_laporan/proses/(:any)', 'AdminCtrl::proses/$1');