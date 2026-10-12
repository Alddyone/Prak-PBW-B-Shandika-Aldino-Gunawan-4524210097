<?php
include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp']; // MODIFIKASI: Menangkap input no_hp
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// MODIFIKASI: Validasi kondisi rentang IPK saat update
if ($ipk < 0 || $ipk > 4) {
    echo "<script>
        alert('IPK harus berada di antara 0.00 dan 4.00!');
        window.history.back();
    </script>";
    exit;
}

$query = mysqli_query(
    $koneksi,
    "UPDATE mahasiswa
    SET nama='$nama',
        email='$email',
        no_hp='$no_hp',
        prodi='$prodi',
        angkatan='$angkatan',
        ipk='$ipk'
    WHERE nim='$nim'"
);

if ($query) {
    echo "<script>
        alert('Data mahasiswa berhasil diubah');
        window.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('Data gagal diubah');
        window.history.back();
        </script>";
}
?>