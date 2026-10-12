<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("Silakan isi form terlebih dahulu.");
}

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$email = trim($_POST["email"] ?? "");
$prodi = $_POST["prodi"] ?? "";
$angkatan = $_POST["angkatan"] ?? "";
$ipk = $_POST["ipk"] ?? "";

if ($nim == "" || $nama == "") {
    exit("NIM dan nama wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Format email tidak valid.");
}

$daftarProdi = [
    "Teknik Informatika",
    "Sistem Informasi",
    "Manajemen"
];

if (!in_array($prodi, $daftarProdi, true)) {
    exit("Pilihan prodi tidak valid.");
}

if (
    !ctype_digit((string)$angkatan) ||
    (int)$angkatan < 2000 ||
    (int)$angkatan > 2099
) {
    exit("Angkatan harus antara 2000 dan 2099.");
}

if (
    !is_numeric($ipk) ||
    (float)$ipk < 0 ||
    (float)$ipk > 4
) {
    exit("IPK harus berada antara 0 dan 4.");
}

$query = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES (?, ?, ?, ?, ?, ?)"
);

if (!$query) {
    exit("Gagal menyiapkan query.");
}

mysqli_stmt_bind_param(
    $query,
    "ssssid",
    $nim,
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk
);

if (mysqli_stmt_execute($query)) {
    echo "Data berhasil disimpan.";
} else {
    echo "Data gagal disimpan.";
}

mysqli_stmt_close($query);
?>
