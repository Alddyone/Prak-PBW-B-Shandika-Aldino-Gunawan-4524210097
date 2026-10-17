<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/controllers/ProdukController.php';

$controller = new ProdukController($koneksi);
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'index';

if ($aksi == 'create') {
    $controller->create();
} elseif ($aksi == 'edit') {
    $controller->edit();
} else {
    $controller->index();
}
?>