# Tugas Pertemuan 4

---

## 1. Sebelum Modifikasi (`contoh1.php`)

<img width="1772" height="1774" alt="pt4 1" src="https://github.com/user-attachments/assets/b210f3fa-aaff-42b5-85f0-3552416e74e6" />

<img width="535" height="216" alt="Screenshot 2026-10-04 162032" src="https://github.com/user-attachments/assets/0b35f627-b54e-4a1d-a3c3-827ec8a8ddd0" />

---

## 2. Sesudah Modifikasi (`tugaspertemuan4contoh1.php`)

<img width="1818" height="2382" alt="pt4 11" src="https://github.com/user-attachments/assets/632e414f-769e-433c-9a23-9babbe0c7592" />

<img width="612" height="345" alt="image" src="https://github.com/user-attachments/assets/bd2bc023-0578-42a0-be77-a432700e13df" />

## 3. Penjelasan 5 Bagian Penting Kode

**require_once 'koneksi.php'**
<br> Menyertakan file konfigurasi untuk membuka koneksi ke database MySQL secara aman dan wajib ada.

**mysqli_query($koneksi, $sqlInsert)**
<br Mengeksekusi perintah SQL untuk memasukkan data awal ke tabel database menggunakan INSERT IGNORE agar terhindar dari duplikasi data.

**$sqlStats = "SELECT COUNT(*) as total_mhs, AVG(ipk) ..."**
<br> Query agregasi SQL untuk menghitung jumlah baris data dan rata-rata nilai IPK dari mahasiswa yang memenuhi kriteria saringan.

**$predikat = ($row['ipk'] >= 3.80) ? ...**
<br> Logika percabangan (ternary operator) PHP untuk melakukan validasi nilai IPK secara dinamis dan memberikan label predikat teks pada setiap baris data.

**mysqli_fetch_assoc($result)**
<br> Mengambil hasil query baris demi baris dari database ke dalam bentuk array asosiatif agar kolom datanya mudah dipanggil menggunakan nama kunci.

---

## 4. Analisis Error, Penyebab, dan Perbaikan
**Pesan Error:**
<br> Warning: mysqli_fetch_assoc() expects parameter 1 to be mysqli_result, bool given

**Penyebab:**
<br>Terjadi kesalahan penulisan (syntax error) pada string query SQL (misalnya salah nama kolom atau tabel), sehingga fungsi mysqli_query() gagal mengeksekusi dan mengembalikan nilai false alih-alih objek hasil query (mysqli_result).

**Langkah Perbaikan:**
<br> Memastikan variabel query SQL ditulis dengan benar dan menambahkan pengecekan fungsi mysqli_query() menggunakan blok kondisi atau debugging mysqli_error($koneksi) sebelum diproses dengan mysqli_fetch_assoc().

---
## 5. Sebelum Modifikasi (`contoh2.php`)

<img width="1588" height="2800" alt="pt4 2" src="https://github.com/user-attachments/assets/ee508ece-d8d3-4a25-a5dd-3f6c3805c3f8" />

<img width="538" height="227" alt="image" src="https://github.com/user-attachments/assets/cf198b45-c338-4168-8cc9-adbbdf4287ea" />

## 6. Sesudah Modifikasi (`tugaspertemuan4contoh2.php`)

<img width="2050" height="3142" alt="pt4 22" src="https://github.com/user-attachments/assets/d4cf06f4-8886-4eb1-9841-6f87b926ceb6" />

<img width="612" height="254" alt="image" src="https://github.com/user-attachments/assets/b10d74ab-0051-4f53-9e28-6c41912aaa3a" />

## 7. Penjelasan 5 Bagian Penting Kode

**$sqlUpdate = ... & mysqli_query()**
<br> Berfungsi mengeksekusi perintah SQL UPDATE untuk memodifikasi record data tertentu di dalam tabel database.

**mysqli_affected_rows($koneksi)**
<br> Fungsi untuk mendeteksi jumlah baris yang terpengaruh/berubah akibat eksekusi query terakhir, berguna sebagai validasi logika backend.

**GROUP BY prodi & AVG(ipk)**
<br> Mengelompokkan data berdasarkan program studi dan menghitung rata-rata nilai IPK dari setiap kelompok prodi secara otomatis melalui fungsi agregat MySQL.

**$sqlVerifikasi & mysqli_num_rows()**
<br> Berfungsi mengecek keberadaan data di database sebelum melakukan aksi destruktif seperti penghapusan (DELETE).

**$sqlDelete = ...**
<br> Perintah SQL untuk menghapus baris data secara permanen berdasarkan kondisi kunci unik (WHERE nim = ...).

---

## 8. Analisis Error, Penyebab, dan Perbaikan
**Pesan Error:**
<br> Fatal error: Uncaught mysqli_sql_exception: Cannot delete or update a parent row: a foreign key constraint fails

**Penyebab:**
<br> Perintah DELETE gagal dieksekusi karena baris data pada tabel mahasiswa sedang terikat sebagai foreign key (relasi) di tabel lain (misalnya tabel nilai, absensi, atau KRS).

**Langkah Perbaikan:**
<br> Menghapus data terkait di tabel anak terlebih dahulu sebelum menghapus data induknya, atau mengatur ulang relasi tabel di database dengan menambahkan opsi ON DELETE CASCADE.