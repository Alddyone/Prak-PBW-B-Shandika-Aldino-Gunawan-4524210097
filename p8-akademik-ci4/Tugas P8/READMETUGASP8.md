# TUGAS PERTEMUAN 8 PRAK PBW B

Aplikasi web sederhana berbasis arsitektur **Model-View-Controller (MVC)** menggunakan **CodeIgniter 4** untuk mengelola data mahasiswa, dilengkapi validasi input sisi server (*server-side validation*) dan tampilan pesan kesalahan pada *view*.

---

## Identitas Mahasiswa
* **Nama:** Shandika Aldino Gunawan
* **NIM:** 4524210097
* **Mata Kuliah:** Pemrograman Berbasis Web

---

## Struktur Komponen MVC
* **Model (`app/Models/MahasiswaModel.php`):** Mengelola interaksi dengan tabel `mahasiswa` menggunakan primary key `nim` dan daftar kolom yang diizinkan (`nim`, `nama`, `email`, `prodi`, `ipk`).
* **Controller (`app/Controllers/MahasiswaController.php`):** Menangani alur CRUD (`index`, `create`, `store`, `edit`, `update`, `delete`) serta menjalankan *validation rules* CodeIgniter 4 sebelum menyimpan atau mengubah data.
* **Views (`app/Views/mahasiswa/`):**
  * `index.php`: Menampilkan tabel daftar mahasiswa, notifikasi *flashdata* sukses, serta tombol aksi **Edit** dan **Hapus** (menggunakan metode `POST` dengan proteksi CSRF dan konfirmasi dialog).
  * `create.php` & `edit.php`: Menyediakan form input data, mempertahankan isian sebelumnya melalui helper `old()`, dan menampilkan daftar pesan kesalahan validasi berwarna merah.
* **Routes (`app/Config/Routes.php`):** Menghubungkan endpoint URL `/mahasiswa`, `/mahasiswa/tambah`, `/mahasiswa/simpan`, `/mahasiswa/edit/(:segment)`, `/mahasiswa/update/(:segment)`, dan `/mahasiswa/delete/(:segment)` ke method controller terkait.

---

## Aturan Validasi Input (Validation Rules CI4)
* **NIM:** `required|numeric|min_length[7]|max_length[15]|is_unique[mahasiswa.nim]` (mengecualikan NIM milik data yang sedang diedit saat proses *update*).
* **Nama:** `required|min_length[3]|max_length[100]`
* **Email:** `required|valid_email|is_unique[mahasiswa.email]` (mengecualikan email milik data yang sedang diedit saat proses *update*).
* **Prodi:** `required`
* **IPK:** `required|decimal|greater_than_equal_to[0]|less_than_equal_to[4]`

---

## Hasil Pengujian & Screenshot

### 1. Daftar Data Mahasiswa (Read)
<img width="560" height="287" alt="Screenshot 2026-11-26 163001" src="https://github.com/user-attachments/assets/4b8e1470-fbed-48ba-a944-65867becad50" />

Daftar Mahasiswa

### 2. Tambah Data Mahasiswa (Create)
<img width="316" height="260" alt="image" src="https://github.com/user-attachments/assets/27d72dac-f9c2-47c8-b653-ca467d88a379" />
<img width="560" height="261" alt="Screenshot 2026-11-26 162258" src="https://github.com/user-attachments/assets/7f6277eb-04ed-4ff9-8257-85560f68c0d9" />

ouput tambah Data

### 3. Validasi Input & Pesan Kesalahan pada View
<img width="347" height="323" alt="image" src="https://github.com/user-attachments/assets/e2389225-2e9e-4aec-909c-d374fb8800d9" />
<img width="377" height="275" alt="Screenshot 2026-11-26 162415" src="https://github.com/user-attachments/assets/b99c1a9b-a3d9-4dfa-8a61-746e460a0df1" />

input kesalahan pada Tambah dan Edit
tidak boleh kolom kosong atau salah satunya kosong, harus diisi

### 4. Ubah Data Mahasiswa (Update)
<img width="530" height="244" alt="Screenshot 2026-11-26 162455" src="https://github.com/user-attachments/assets/f54f7e98-ae8d-4e49-a721-feb12cbdc59c" />

Data berhasil diedit

### 5. Hapus Data Mahasiswa (Delete)
<img width="700" height="329" alt="Screenshot 2026-11-26 162549" src="https://github.com/user-attachments/assets/1df55452-82c9-482e-8037-b0f37c24b541" />
<img width="700" height="270" alt="Screenshot 2026-11-26 162611" src="https://github.com/user-attachments/assets/43308eb6-85f7-4836-9db0-3d71331da687" />

Data berhasil dihapus   