<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController {
    private $model;

    public function __construct($koneksi) {
        $this->model = new ProdukModel($koneksi);
    }    

    public function index() {
        $dataProduk = $this->model->getAllProduk();
        require __DIR__ . '/../views/produk/index.php';
    }

    public function create() {
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            if ($this->model->tambahProduk($nama, $harga, $stok)) {
                header("Location: index.php");
                exit;
            }
        }
        require __DIR__ . '/../views/produk/create.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $produk = $this->model->getProdukById($id);

        if (isset($_POST['submit'])) {
            $nama = $_POST['nama_produk'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            if ($this->model->updateProduk($id, $nama, $harga, $stok)) {
                header("Location: index.php");
                exit;
            }
        }
        require __DIR__ . '/../views/produk/edit.php';
    }
}
?>