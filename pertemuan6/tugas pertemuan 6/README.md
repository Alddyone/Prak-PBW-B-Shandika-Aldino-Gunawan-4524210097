# Tugas Pertemuan 6

---
<h2>index.php</h2>
## 1. Sebelum Modifikasi (`index.php`)

<img width="1942" height="2876" alt="2" src="https://github.com/user-attachments/assets/68f39808-69c8-47de-9f55-d9a0d26f7beb" />

<img width="788" height="248" alt="image" src="https://github.com/user-attachments/assets/f7cd572c-802e-49e1-ac39-0843dfef3f81" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan6index.php`)

<img width="753" height="202" alt="image" src="https://github.com/user-attachments/assets/bf240df5-cba6-4259-8c3e-a16c84cff17a" />

## 3. Penjelasan 5 Bagian Penting Kode

**1. include "koneksi.php"**

<br>Penjelasan: Berfungsi untuk menyambungkan file utama ke database MySQL melalui script koneksi.

**2. $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa"**

<br>Penjelasan: Menjalankan perintah SQL untuk mengambil seluruh data dari tabel mahasiswa.

**3. th class="...">No. HP</th**

Penjelasan: Bagian modifikasi tampilan berupa penambahan kolom header tabel untuk menampilkan nomor handphone.

**4. ?= $data['no_hp']**

Penjelasan: Menampilkan data nilai no_hp secara dinamis dari hasil query database ke dalam baris tabel.

**5. a href="edit.php?nim=<?= $data['nim']; ?**

Penjelasan: Membuat tautan tombol edit yang membawa parameter NIM spesifik menggunakan metode GET.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error: Warning: Undefined array key "no_hp"**

<br>Penyebab: Kolom no_hp belum ditambahkan ke dalam tabel database MySQL padahal dipanggil di script PHP.

<br>Perbaikan: Menjalankan perintah SQL ALTER TABLE mahasiswa ADD COLUMN no_hp VARCHAR(15) NOT NULL AFTER email; langsung di phpMyAdmin.

---
<h2>create.ph</h2>

## 1. Sebelum Modifikasi (`create.php`)

<img width="1572" height="2116" alt="1" src="https://github.com/user-attachments/assets/2789c99a-ae8b-49a4-b1c2-c23d324b5bd1" />

<img width="345" height="403" alt="image" src="https://github.com/user-attachments/assets/0314c679-9a28-49f8-80e5-60a0e3b11d43" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan6create.php`)

<img width="1634" height="2306" alt="aftcrt" src="https://github.com/user-attachments/assets/572937d8-b3f9-4e3b-9638-fc6b7c3c2779" />

<img width="253" height="444" alt="image" src="https://github.com/user-attachments/assets/8ea4b3f2-1427-410f-8004-ac44ea3bb84c" />

## 3. Penjelasan 5 Bagian Penting Kode

**1. <script src="[https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4](https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4)"></script>**

Penjelasan: Memuat framework Tailwind CSS via CDN untuk mendesain tampilan form secara modern dan rapi.

**2. form action="store.php" method="POST"**

Penjelasan: Elemen form yang mengatur pengiriman data input pengguna ke file store.php menggunakan metode POST.

**3. label for="no_hp">No. HP:</label**

Penjelasan: Bagian modifikasi berupa teks label untuk kolom nomor handphone pada form input.

**4. <input type="text" id="no_hp" name="no_hp" required**

Penjelasan: Elemen input teks baru hasil modifikasi untuk memasukkan data nomor handphone.

**5. <input type="number" id="ipk" name="ipk" step="0.01" min="0" max="4" required**

Penjelasan: Elemen input IPK yang dilengkapi batasan nilai minimal (0) dan maksimal (4) agar sesuai standar akademik.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error: Tampilan form berantakan atau tidak merespons kelas styling Tailwind.**

**Penyebab:** Koneksi internet terputus saat mengakses script Tailwind CSS CDN di bagian <head>.

**Perbaikan:** Pastikan perangkat terhubung ke internet agar file CSS eksternal dapat dimuat dengan sempurna oleh browser.

---
<h2>store.php</h2>

## 1. Sebelum Modifikasi (`store.php`)

<img width="1140" height="1584" alt="3" src="https://github.com/user-attachments/assets/c46bf9ae-c304-423c-aaa2-b527d1ceda8f" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan6store.php`)

<img width="1526" height="1964" alt="aftstr" src="https://github.com/user-attachments/assets/ab018608-667e-4fc7-89f6-3e18aa031d31" />
<img width="2064" height="2686" alt="aftdt" src="https://github.com/user-attachments/assets/cd72a20a-3f42-4ccc-8928-99e9e7e9cd9a" />

## 3. Penjelasan 5 Bagian Penting Kode

**1.  $no_hp = $_POST['no_hp']**

Penjelasan: Bagian modifikasi untuk menangkap data nomor handphone yang dikirimkan dari form create.php.

**2. if ($ipk < 0 || $ipk > 4) { ... }**

Penjelasan: Modifikasi validasi kondisi logika untuk memastikan IPK yang diinput berada di rentang valid (0.00 - 4.00).

**3. window.history.back();**

Penjelasan: Perintah JavaScript untuk mengembalikan pengguna ke halaman form sebelumnya jika validasi gagal.

**4. "INSERT INTO mahasiswa (...) VALUES (...)"**

Penjelasan: Query SQL untuk memasukkan data baru termasuk variabel $no_hp ke dalam database.

**5. window.location.href = 'index.php';**

Penjelasan: Mengarahkan ulang halaman secara otomatis ke index.php setelah data berhasil disimpan.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error: Fatal error: Uncaught mysqli_sql_exception: Column count doesn't match value count**

**Penyebab:** Jumlah kolom yang dideklarasikan pada query INSERT tidak sama dengan jumlah nilai variabel yang dimasukkan.

**Perbaikan:** Menyesuaikan urutan dan jumlah variabel data (termasuk $no_hp) agar sinkron dengan struktur kolom tabel database.

---
<h2>edit.php</h2>

## 1. Sebelum Modifikasi (`edit.php`)

<img width="1834" height="2496" alt="4" src="https://github.com/user-attachments/assets/f6e0f01a-93eb-4b1e-96d8-c8103ccc19ee" />

<img width="272" height="382" alt="image" src="https://github.com/user-attachments/assets/ae7368a8-3691-4548-b1e6-fd64ccb2ae20" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan6edit.php`)

<img width="2064" height="2686" alt="aftdt" src="https://github.com/user-attachments/assets/2cb3b602-31ea-4abf-af77-1fd43d4fb318" />

<img width="279" height="413" alt="image" src="https://github.com/user-attachments/assets/84aa1b3e-5abe-4c64-bf38-901183c131c4" />

## 3. Penjelasan 5 Bagian Penting Kode

**1. $nim = $_GET['nim'];**

Penjelasan: Menangkap parameter NIM yang dikirim melalui URL dari halaman index.php.

**2. "SELECT * FROM mahasiswa WHERE nim = '$nim'"**

Penjelasan: Query SQL untuk mencari dan mengambil data spesifik mahasiswa yang akan diedit.

**3. $data = mysqli_fetch_assoc($query);**

Penjelasan: Mengubah hasil query database menjadi array asosiatif agar dapat dibaca oleh form HTML.

**4. <input type="text" name="nim" value="<?= $data['nim'] ?>" readonly ...>**

Penjelasan: Menampilkan NIM lama dan menguncinya dengan atribut readonly agar tidak bisa diubah sembarangan.

**5. input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required**

Penjelasan: Bagian modifikasi form edit untuk menampilkan data nomor handphone yang sudah tersimpan sebelumnya.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error: Trying to access array offset on value of type null**

**Penyebab:** File edit.php dibuka langsung di browser tanpa menyertakan parameter NIM di URL, sehingga data dari database bernilai kosong.

**Perbaikan:** Selalu akses halaman edit melalui tombol "Edit" di index.php agar parameter NIM (?nim=...) terkirim dengan benar.

---
<h2>update.php</h2>

## 1. Sebelum Modifikasi (`update.php`)

<img width="1048" height="1546" alt="5" src="https://github.com/user-attachments/assets/c8fe59ea-4224-401e-a7a9-64ab88d53ba1" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan6update.php`)

<img width="1264" height="1964" alt="aftud" src="https://github.com/user-attachments/assets/a41bc4f5-2d27-46da-a415-b799bb56d3c1" />
<img width="1064" height="1166" alt="dlt" src="https://github.com/user-attachments/assets/3dbffe09-cec6-4642-a880-c9f789027b7c" />
<img width="1064" height="1166" alt="dlt" src="https://github.com/user-attachments/assets/1299920d-8510-4143-b718-1b946e3560f5" />

## 3. Penjelasan 5 Bagian Penting Kode

**1. $no_hp = $_POST['no_hp'];**

Penjelasan: Modifikasi penangkapan data input nomor handphone terbaru dari form edit.

**2. if ($ipk < 0 || $ipk > 4) { ... }**

Penjelasan: Validasi kondisi rentang IPK saat proses pembaruan data untuk mencegah data tidak valid masuk.

**3. "UPDATE mahasiswa SET ... WHERE nim='$nim'"**

Penjelasan: Query SQL untuk memperbarui data mahasiswa (nama, email, no_hp, prodi, angkatan, ipk) berdasarkan NIM.

**4. if ($query)**

Penjelasan: Pengecekan kondisi apakah eksekusi query update ke database berhasil dilakukan.

**5. window.location.href = 'index.php';**

Penjelasan: Mengalihkan halaman kembali ke tabel utama setelah data sukses diperbarui.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error:** Data gagal diubah dan halaman kembali ke form tanpa pesan error yang jelas.

**Penyebab:** Penulisan nama kolom pada klausa SET di query SQL ada yang salah ketik (typo) atau tidak sesuai dengan nama kolom di database.

**Perbaikan:** Memeriksa kembali ejaan nama kolom (seperti no_hp atau prodi) pada string SQL agar cocok dengan struktur tabel.
---
<h2>delete.php`</h2>

## 1. Sebelum Modifikasi (`delete.php`)

<img width="1064" height="1166" alt="6" src="https://github.com/user-attachments/assets/3654b304-6051-457e-b8a9-f38b0a9c11f9" />

---

## 2. Sesudah Modifikasi

<img width="1064" height="1166" alt="dlt" src="https://github.com/user-attachments/assets/956e6397-caa2-45ae-ab6e-b24092271a57" />
<br>File delete.php tidak memerlukan modifikasi fungsional karena sudah berjalan dengan baik

## 3. Penjelasan 5 Bagian Penting Kode

**1. include "koneksi.php";**

Penjelasan: Memanggil file koneksi agar script dapat terhubung ke database sebelum melakukan penghapusan data.

**2. $nim = $_GET['nim'];**

Penjelasan: Menangkap parameter NIM mahasiswa yang dikirimkan melalui URL saat tombol Hapus diklik.

**3. "DELETE FROM mahasiswa WHERE nim='$nim'"**

Penjelasan: Query SQL untuk menghapus baris data mahasiswa dari database berdasarkan NIM yang dipilih.

**4. if ($query) { alert('Data mahasiswa berhasil dihapus'); ... }**

Penjelasan: Kondisi pengecekan sukses yang memunculkan pop-up pemberitahuan via JavaScript.

**5. window.history.back(); pada blok else**

Penjelasan: Fungsi pengaman untuk mengembalikan pengguna jika proses penghapusan data di database mengalami kendala.

---
## 4. Analisis Error, Penyebab, dan Perbaikan

**Error:** Data terhapus tanpa ada konfirmasi atau langsung terhapus saat halaman tidak sengaja diakses.

**Penyebab:** Tidak adanya fungsi konfirmasi JavaScript pada tag link hapus di file index.php.

**Perbaikan:** Menambahkan atribut onclick="return confirm('Yakin ingin menghapus data ini?');" pada tag <a> hapus di index.php.

---