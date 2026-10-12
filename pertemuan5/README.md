# Tugas Pertemuan 5

---

## 1. Sebelum Modifikasi (`form.php`)

<img width="1186" height="1356" alt="bf5" src="https://github.com/user-attachments/assets/f3677bca-f0f2-48ed-b5a3-5d21fa263834" />

<img width="532" height="224" alt="image" src="https://github.com/user-attachments/assets/a6ba5805-63b9-4864-b728-c80757da4243" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan5form.php`)

<img width="1388" height="1622" alt="af5" src="https://github.com/user-attachments/assets/456ec34a-0ef3-413b-bcb0-4ae1f4878404" />

<img width="641" height="196" alt="image" src="https://github.com/user-attachments/assets/b51a71b5-35bb-4c3a-ab64-63a7a70cec38" />


## 3. Penjelasan 5 Bagian Penting Kode

**1. Form dan metode POST**

<br>form action="simpan.php" method="post"
<br>Penjelasan: 
<br>Kode ini membuat form yang mengirimkan data ke file simpan.php menggunakan metode POST untuk diproses lebih lanjut.

**2. Input NIM**

<br>input type="text" name="nim" required
<br>Penjelasan: Input ini digunakan untuk memasukkan NIM mahasiswa. Atribut name="nim" menentukan nama data yang dikirim ke PHP, sedangkan required membuat kolom wajib diisi melalui form browser.

**3. Input email**

<br>input type="email" name="email" required
<br>Penjelasan: Input ini digunakan untuk memasukkan alamat email. Tipe email membantu browser memeriksa format email sebelum form dikirim.

**4. Dropdown Prodi**

<img width="392" height="115" alt="image" src="https://github.com/user-attachments/assets/dd9f02c2-ea1b-4eef-ad22-643899d58698" />

<br>Penjelasan: Kode ini menyediakan pilihan program studi sehingga pengguna tidak perlu mengetik secara manual. Hal ini membantu menjaga konsistensi data yang dimasukkan.

**5. Validasi batas IPK**

<img width="286" height="68" alt="image" src="https://github.com/user-attachments/assets/f109f552-84d4-4e9c-98fc-0da68388154a" />

<br>Penjelasan: Input IPK hanya menerima angka, dengan rentang 0 sampai 4 dan kenaikan 0,01. Validasi browser ini membantu mengurangi kesalahan input, tetapi tetap perlu diperiksa kembali di simpan.php.

---
## 4. Analisis Error, Penyebab, dan Perbaikan
**Error pada form.php**

Error: File simpan.php tidak ditemukan (404 Not Found).<br>
Penyebab: Atribut action pada form menunjuk ke lokasi yang salah atau file simpan.php tidak berada di folder yang diharapkan.
Langkah perbaikan:<br>
1. Memastikan file form.php dan simpan.php berada di folder project yang sesuai.
2. Memeriksa atribut action pada form.
3. Memastikan nama file ditulis dengan benar.
<br>form action="simpan.php" method="post"  
---

## 5. Sebelum Modifikasi (`simpan.php`)

<img width="1280" height="1204" alt="knksi5" src="https://github.com/user-attachments/assets/709de2cf-c11e-4ff9-84df-b53f9d5ee7e8" />

## 6. Sesudah Modifikasi (`tugaspertemuan5simpan.php`)

<img width="1064" height="3294" alt="smpanaft" src="https://github.com/user-attachments/assets/b2670fc1-a295-4f5b-ac6f-002682ec5271" />

## 7. Penjelasan 5 Bagian Penting Kode

**1. Menghubungkan ke database**

include "koneksi.php";

Penjelasan: Perintah include memasukkan file koneksi.php yang berisi konfigurasi koneksi database sehingga simpan.php dapat berkomunikasi dengan MySQL.

**2. Mengambil data dari form**

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");

Penjelasan: Data NIM dan nama diambil dari form yang dikirim menggunakan POST. Fungsi trim() menghapus spasi di awal dan akhir, sedangkan operator ?? memberikan string kosong jika data tidak tersedia.

**3. Validasi format email**

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit("Format email tidak valid.");
}

Penjelasan: Fungsi filter_var() memeriksa format email. Jika format tidak valid, program dihentikan dan pesan kesalahan ditampilkan sehingga data tidak diteruskan ke proses penyimpanan.

**4. Menyiapkan query INSERT**

$query = mysqli_prepare(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, prodi, angkatan, ipk)
    VALUES (?, ?, ?, ?, ?, ?)"


Penjelasan: Fungsi mysqli_prepare() menyiapkan query untuk memasukkan data mahasiswa ke database. Tanda tanya merupakan parameter yang nantinya diisi dengan data menggunakan mysqli_stmt_bind_param(), sehingga input tidak digabungkan langsung ke dalam perintah SQL.

**5. Menjalankan query dan memeriksa hasilnya**

if (mysqli_stmt_execute($query)) {
    echo "Data berhasil disimpan.";
} else {
    echo "Data gagal disimpan.";
}

Penjelasan: Fungsi mysqli_stmt_execute() menjalankan query yang sudah disiapkan. Program kemudian menampilkan pesan sesuai dengan keberhasilan atau kegagalan eksekusi query.

---

## 8. Analisis Error, Penyebab, dan Perbaikan
**Error pada simpan.php**

<h3>Error: Undefined array key "nim" </h3>

<br>Penyebab: Program mencoba mengambil data $_POST["nim"] ketika data tersebut tidak tersedia, misalnya saat simpan.php dibuka langsung tanpa mengirim form.
<br>Langkah perbaikan:
1. Memastikan data dikirim melalui metode POST.
2. Memeriksa metode request sebelum mengambil data.
3. Menggunakan operator ?? agar key yang tidak tersedia tidak langsung menimbulkan peringatan.

Kode perbaikannya:
<br>
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("Silakan isi form terlebih dahulu.");
}

$nim = trim($_POST["nim"] ?? "");

Hasil perbaikan: Ketika simpan.php dibuka langsung, program menampilkan pesan untuk mengisi form terlebih dahulu. Jika key nim tidak tersedia pada request POST, variabel $nim memperoleh nilai string kosong.