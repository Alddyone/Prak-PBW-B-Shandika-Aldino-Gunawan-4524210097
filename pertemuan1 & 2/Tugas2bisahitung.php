<?php
interface BisaDihitung {
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung {
    public function __construct(
        protected string $nama,
        protected float $harga,
        protected string $kategori = 'Umum'
    ) {
        // Modifikasi 1: Validasi input harga
        if ($harga <= 0) {
            throw new InvalidArgumentException("Harga produk harus lebih besar dari 0.");
        }
    }

    public function hargaAkhir(): float {
        // Modifikasi 2: Tambah PPN 11% untuk produk umum
        $ppn = $this->harga * 0.11;
        return $this->harga + $ppn;
    }

    public function getNama(): string {
        return $this->nama;
    }

    public function getKategori(): string {
        return $this->kategori;
    }
}

class ProdukDiskon extends Produk {
    public function __construct(string $nama, float $harga, private float $diskon, string $kategori = 'Diskon') {
        parent::__construct($nama, $harga, $kategori);
        
        // Modifikasi 1: Validasi rentang diskon
        if ($diskon < 0 || $diskon > 100) {
            throw new InvalidArgumentException("Diskon harus berada di antara 0% sampai 100%.");
        }
    }

    public function hargaAkhir(): float {
        $hargaSetelahDiskon = $this->harga * (1 - $this->diskon / 100);
        // Modifikasi 2: Tetap kenakan PPN 11% setelah diskon
        $ppn = $hargaSetelahDiskon * 0.11;
        return $hargaSetelahDiskon + $ppn;
    }
}

try {
    $daftar = [
        new Produk('Keyboard', 250000, 'Aksesoris'),
        new ProdukDiskon('Mouse', 150000, 10, 'Elektronik'),
    ];

    foreach ($daftar as $produk) {
        echo "Produk: {$produk->getNama()} [Kategori: {$produk->getKategori()}], Harga Akhir (Inc. PPN): Rp " . number_format($produk->hargaAkhir(), 0, ',', '.') . "<br>";
    }
} catch (InvalidArgumentException $e) {
    echo "Error: " . $e->getMessage();
}
?>