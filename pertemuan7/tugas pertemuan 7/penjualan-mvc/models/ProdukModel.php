<?php
class ProdukModel {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function getAllProduk() {
        $query = mysqli_query($this->koneksi, "SELECT * FROM produk");
        return $query;
    }

    public function tambahProduk($nama, $harga, $stok) {
        $query = "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')";
        return mysqli_query($this->koneksi, $query);
    }

    public function getProdukById($id) {
        $query = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE id = '$id'");
        return mysqli_fetch_assoc($query);
    }

    public function updateProduk($id, $nama, $harga, $stok) {
        $query = "UPDATE produk SET nama_produk = '$nama', harga = '$harga', stok = '$stok' WHERE id = '$id'";
        return mysqli_query($this->koneksi, $query);
    }
}
?>