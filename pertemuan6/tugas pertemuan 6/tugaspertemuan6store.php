<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp']; // MODIFIKASI: Menangkap input no_hp
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $ipk = $_POST['ipk'];

    // MODIFIKASI: Validasi kondisi rentang IPK (harus antara 0.00 sampai 4.00)
    if ($ipk < 0 || $ipk > 4) {
        echo "<script>
            alert('IPK harus berada di antara 0.00 dan 4.00!');
            window.history.back();
        </script>";
        exit;
    }

    $query = mysqli_query(
        $koneksi,
        "INSERT INTO mahasiswa
        (nim, nama, email, no_hp, prodi, angkatan, ipk)
        VALUES
        ('$nim', '$nama', '$email', '$no_hp',
        '$prodi', '$angkatan', '$ipk')"
    );

    if ($query) {
        echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal disimpan');
            window.history.back();
        </script>";
    }
}
?>