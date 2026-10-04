# Tugas Pertemuan 3

---

## 1. Sebelum Modifikasi (`contoh2.php`)

<img width="1386" height="4586" alt="cnt2" src="https://github.com/user-attachments/assets/d300938f-1270-43f2-90d5-9920d5e1de44" />

<img width="458" height="318" alt="Screenshot 2026-10-04 154626" src="https://github.com/user-attachments/assets/851bb558-3b64-4b1a-b3a5-7683c5d8f9af" />

---

## 2. Sesudah Modifikasi (`tugas3.php`)

<img width="1386" height="4662" alt="aft3" src="https://github.com/user-attachments/assets/87960015-8f91-48ca-b647-5a41e5877001" />

<img width="429" height="343" alt="Screenshot 2026-10-04 154423" src="https://github.com/user-attachments/assets/4b886aab-72e8-4ea2-af36-96333e9d4dd7" />

---

## 3. Penjelasan 5 Bagian Penting Kode

**IInisialisasi Koneksi (require_once 'koneksi.php')**
<br> Berfungsi untuk memanggil file eksternal yang berisi konfigurasi koneksi database, memastikan skrip utama bisa berkomunikasi dengan server MySQL.

**Pembuatan Database Otomatis (CREATE DATABASE IF NOT EXISTS akademik):**
<br> Perintah SQL untuk membuat database baru secara dinamis apabila database tersebut belum pernah dibuat sebelumnya, sehingga meminimalisir error saat inisialisasi awal.

**Pengaturan Set Karakter (mysqli_set_charset):**
<br> Memastikan komunikasi data antara PHP dan MySQL menggunakan standar utf8mb4 agar data teks, simbol, atau karakter khusus tersimpan dengan benar tanpa korupsi data.

**Struktur Relasi Tabel dalam Array ($sqlCreateTables):**
<br> Menyimpan daftar query pembuatan tabel secara terstruktur (mahasiswa, dosen, mata_kuliah, krs, dan mk_krs) lengkap dengan aturan Primary Key, Foreign Key, dan Constraint relasionalnya.

**Eksekusi Perulangan & Pembersihan (foreach & mysqli_close):**
<br> Melakukan iterasi untuk menjalankan eksekusi pembuatan seluruh tabel secara otomatis, serta menutup koneksi database di akhir baris program untuk menghemat sumber daya memori server.

---

## 4. Analisis Error, Penyebab, dan Perbaikan
**Jenis Error:**
<br> Gagal membuat tabel: Cannot add foreign key constraint (Gagal membuat relasi kunci tamu).
<br>**Penyebab:**
<br> Error ini umumnya terjadi jika urutan pembuatan tabel di dalam array $sqlCreateTables terbalik. Contohnya, jika tabel mata_kuliah diletakkan sebelum tabel dosen, MySQL akan menolak eksekusi tersebut karena kolom yang direferensikan (dosen(id)) belum ada atau belum tercipta di database.

**langkah Perbaikan:**
<br> Pastikan urutan pembuatan tabel hierarkis dari yang independen ke yang bergantung pada relasi (child-parent). Buat tabel master/induk terlebih dahulu (seperti mahasiswa dan dosen), baru kemudian buat tabel turunannya yang memiliki Foreign Key (seperti mata_kuliah, krs, dan mk_krs)