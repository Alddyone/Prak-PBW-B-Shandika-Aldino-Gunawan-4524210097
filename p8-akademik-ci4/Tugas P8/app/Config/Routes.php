<?php

use App\Controllers\MahasiswaController;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/mahasiswa', 'MahasiswaController::index');
$routes->get('/mahasiswa/tambah', 'MahasiswaController::create');
$routes->post('/mahasiswa/simpan', 'MahasiswaController::store');

$routes->get('mahasiswa/edit/(:segment)', 'MahasiswaController::edit/$1');
$routes->post('mahasiswa/update/(:segment)', 'MahasiswaController::update/$1');
$routes->post('mahasiswa/delete/(:segment)', 'MahasiswaController::delete/$1'); 