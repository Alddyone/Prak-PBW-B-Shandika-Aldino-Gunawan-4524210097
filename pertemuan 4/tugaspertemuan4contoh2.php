<?php
require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');

// ==========================================
// 1. UPDATE: Mengubah data IPK + Validasi Baris Terubah
// ==========================================
echo "=== 1. PROSES UPDATE DATA ===\n";
$sqlUpdate = "UPDATE mahasiswa SET ipk = 3.40 WHERE nim = '2025003'";
if (mysqli_query($koneksi, $sqlUpdate)) {
    // Modifikasi 1: Validasi apakah ada baris yang benar-benar berubah
    if (mysqli_affected_rows($koneksi) > 0) {
        echo "Data IPK mahasiswa dengan NIM 2025003 berhasil diubah menjadi 3.40.\n\n";
    } else {
        echo "Query berhasil, tetapi tidak ada data yang berubah (NIM tidak ditemukan atau IPK sudah 3.40).\n\n";
    }
} else {
    echo "Gagal UPDATE: " . mysqli_error($koneksi) . "\n\n";
}

// ==========================================
// 2. SELECT & GROUP BY: Rekap jumlah & rata-rata IPK per prodi (Modifikasi 2)
// ==========================================
echo "=== 2. REKAPITULASI PRODI ===\n";
$sqlRekap = "SELECT prodi, COUNT(*) AS jumlah_mahasiswa, AVG(ipk) AS rata_ipk
             FROM mahasiswa
             GROUP BY prodi
             ORDER BY jumlah_mahasiswa DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if (mysqli_num_rows($resultRekap) > 0) {
    while ($row = mysqli_fetch_assoc($resultRekap)) {
        echo "Prodi      : " . $row['prodi'] . "\n";
        echo "Jumlah Mhs : " . $row['jumlah_mahasiswa'] . "\n";
        echo "Rata-rata  : " . number_format($row['rata_ipk'], 2) . "\n";
        echo "----------------------------------------\n";
    }
} else {
    echo "Tidak ada data rekap prodi.\n\n";
}

// ==========================================
// 3. SELECT: Verifikasi sebelum penghapusan
// ==========================================
echo "=== 3. VERIFIKASI SEBELUM DELETE ===\n";
$sqlVerifikasi = "SELECT * FROM mahasiswa WHERE nim = '2025003'";
$resultVerifikasi = mysqli_query($koneksi, $sqlVerifikasi);

if (mysqli_num_rows($resultVerifikasi) > 0) {
    $row = mysqli_fetch_assoc($resultVerifikasi);
    echo "Data ditemukan:\n";
    echo "NIM  : " . $row['nim'] . "\n";
    echo "Nama : " . $row['nama'] . "\n";
    echo "Prodi: " . $row['prodi'] . "\n";
    echo "IPK  : " . $row['ipk'] . "\n\n";

    // ==========================================
    // 4. DELETE: Menghapus data (hanya jika terverifikasi)
    // ==========================================
    echo "=== 4. PROSES DELETE DATA ===\n";
    $sqlDelete = "DELETE FROM mahasiswa WHERE nim = '2025003'";
    if (mysqli_query($koneksi, $sqlDelete)) {
        echo "Data mahasiswa dengan NIM 2025003 berhasil dihapus dari tabel.\n";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi) . "\n";
    }
} else {
    echo "Data mahasiswa tidak ditemukan, proses delete dibatalkan.\n";
}

mysqli_close($koneksi);
?>