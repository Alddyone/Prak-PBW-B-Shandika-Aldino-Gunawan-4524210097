SEBELUM MODIFIKASI (contoh1.php)
<img width="1372" height="2876" alt="cnth1bfr" src="https://github.com/user-attachments/assets/3f7b7cb8-2ca6-441a-8710-5df99a266977" />
<img width="956" height="455" alt="Screenshot 2026-09-28 151432" src="https://github.com/user-attachments/assets/3e1fb361-b9e4-427f-832e-b162ba2b5e28" />

SESUDAH MODIFIKASI (Tugas1kalkulator.php)
<img width="1434" height="3940" alt="aftr1" src="https://github.com/user-attachments/assets/493b7a94-e434-406f-9e25-53265737ab5e" />
<img width="950" height="463" alt="Screenshot 2026-09-28 150614" src="https://github.com/user-attachments/assets/606a73a3-5765-4558-bc8e-6cc2b79b4d74" />

PENJELASAN 5 BAGIAN PENTING
1. Mengecek method POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

Bagian ini digunakan untuk mengecek apakah form sudah dikirim menggunakan metode POST. Jika form sudah dikirim, program akan mengambil dan memproses data yang dimasukkan pengguna.

2. Mengambil input dari form

$nama = $_POST['nama'] ?? '';
$a = $_POST['a'] ?? '';
$b = $_POST['b'] ?? '';
$operator = $_POST['operator'] ?? '';

Bagian ini digunakan untuk mengambil data dari form, yaitu nama, angka pertama, angka kedua, dan operator. Operator tersebut digunakan untuk menentukan operasi matematika yang akan dilakukan.

3. Validasi input angka — MODIFIKASI

if ($a === '' || $b === '') {
    $pesan = 'Angka pertama dan kedua harus diisi.';
}

Bagian ini merupakan modifikasi berupa validasi. Program akan mengecek apakah angka pertama dan kedua sudah diisi. Jika belum, program akan menampilkan pesan bahwa kedua angka harus diisi.

4. Menentukan operasi menggunakan switch

switch ($operator) {
    case '+':
        $hasil = $a + $b;
        break;
    case '-':
        $hasil = $a - $b;
        break;
    case '*':
        $hasil = $a * $b;
        break;
    case '/':
        ...
}

Bagian switch digunakan untuk menentukan operasi berdasarkan operator yang dipilih pengguna. Program dapat melakukan penjumlahan, pengurangan, perkalian, dan pembagian.

5. Menambahkan operasi pangkat — MODIFIKASI

case '^':
    $hasil = $a ** $b;
    break;

Bagian ini merupakan modifikasi dengan menambahkan operasi pangkat. Operator ** digunakan untuk menghitung perpangkatan, contohnya 2 ** 3 menghasilkan 8.

1. Jenis Error:

Warning: Undefined array key

2. Penyebab:

Script mencoba mengakses data $_POST (seperti $_POST['nama']) yang belum dikirim atau tidak ada dalam request.

3. Perbaikan:

Gunakan null coalescing operator (??) untuk memberi nilai default, atau cek dengan isset() sebelum mengaksesnya:
$nama = $_POST['nama'] ?? '';

<br>SEBELUM MODIFIKASI (contoh2.php)
<img width="1602" height="1736" alt="bfr2" src="https://github.com/user-attachments/assets/9961da95-20bd-4c67-a86b-8d74108a7d75" />
<img width="923" height="329" alt="Screenshot 2026-09-28 155345" src="https://github.com/user-attachments/assets/63c3f7a2-d756-401a-b2c2-ed8b3f7248ac" />

SESUDAH MODIFIKASI (Tugas1biodata)
<img width="1294" height="2344" alt="aftr2" src="https://github.com/user-attachments/assets/1d85dc06-b9bc-4507-9a62-4b796a81df49" />
<img width="830" height="367" alt="image" src="https://github.com/user-attachments/assets/7a8eb442-8b31-41f6-8498-a97cdf0639f0" />

PENJELASAN 5 BAGIAN PENTING
1. Function statusKelulusan()

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

Function ini digunakan untuk menentukan predikat mahasiswa berdasarkan IPK. Program akan mengecek IPK menggunakan kondisi if.

2. Function statusSemester() — Modifikasi 1

function statusSemester(int $semester): string
{
    if ($semester <= 2) return 'Mahasiswa Baru';
    if ($semester <= 6) return 'Mahasiswa Aktif';
    return 'Mahasiswa Tingkat Akhir';
}

Ini adalah modifikasi pertama, yaitu menambahkan kondisi baru. Function ini menentukan status mahasiswa berdasarkan semester.

Contohnya:

Semester 1–2 → Mahasiswa Baru
Semester 3–6 → Mahasiswa Aktif
Semester 7+ → Mahasiswa Tingkat Akhir

3. Array $mahasiswa — Modifikasi 2

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Raja Jossi',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'jenis_kelamin' => 'Laki-laki',
    'ipk' => 3.7
];

Array ini digunakan untuk menyimpan data mahasiswa. Modifikasi kedua adalah menambahkan field baru yaitu jenis_kelamin.

4. Perulangan foreach

foreach ($mahasiswa as $kunci => $nilai):

foreach digunakan untuk mengambil setiap data yang ada di dalam array $mahasiswa dan menampilkannya satu per satu.

Jadi ketika kita menambahkan field baru seperti jenis_kelamin, field tersebut otomatis ikut ditampilkan tanpa perlu menambahkan kode HTML lagi.

5. Menampilkan hasil function

Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?
Status: <?= statusSemester($mahasiswa['semester']) ?

Bagian ini memanggil kedua function yang sudah dibuat. statusKelulusan() menggunakan nilai IPK, sedangkan statusSemester() menggunakan nilai semester untuk menghasilkan informasi tambahan.

<br>1. Error:

TypeError (Array to string conversion)

2. Penyebab:

Mencoba mencetak data array/objek langsung sebagai string di dalam HTML.

3. Perbaikan:

Pastikan data yang dicetak bertipe skalar, atau gunakan pengecekan:
<?php if (!is_array($nilai)) echo htmlspecialchars($nilai); ?>

<br>SEBELUM MODIFIKASI (contoh3.php)
<img width="1448" height="1812" alt="bfr3" src="https://github.com/user-attachments/assets/1fece5dc-aa2e-48e8-9835-b058fc28924d" />
<img width="959" height="389" alt="Screenshot 2026-09-28 151645" src="https://github.com/user-attachments/assets/0aa8fcfd-b3b2-42ff-a661-83fe10a21a49" />

SESUDAH MODIFIKASI (Tugas1identitas)
<img width="1434" height="2686" alt="aftr3" src="https://github.com/user-attachments/assets/df25deb3-89f4-4edd-b47c-771b27f69716" />
<img width="954" height="464" alt="Screenshot 2026-09-28 151551" src="https://github.com/user-attachments/assets/91cd8b82-ce35-48e7-8667-f02d44d8d8d4" />

PENJELASAN 5 BAGIAN PENTING
1. Array $mahasiswa

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Raja Jossi',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'jenis_kelamin' => 'Laki-laki',
    'ipk' => 3.7
];

Bagian ini menyimpan seluruh data mahasiswa dalam bentuk array associative. Saya juga menambahkan jenis_kelamin sebagai modifikasi pertama berupa field baru.

2. Function statusKelulusan()

function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

Function ini menentukan predikat mahasiswa berdasarkan nilai IPK. Jika IPK 3.50 atau lebih, hasilnya Sangat Memuaskan, sedangkan IPK 3.00–3.49 mendapat Memuaskan.

3. Function statusSemester() — MODIFIKASI

function statusSemester(int $semester): string
{
    if ($semester <= 2) return 'Mahasiswa Baru';
    if ($semester <= 6) return 'Mahasiswa Aktif';
    return 'Mahasiswa Tingkat Akhir';
}

Ini merupakan modifikasi kedua, yaitu menambahkan kondisi baru. Function menentukan status mahasiswa berdasarkan semester.

Contohnya:

Semester 1–2 → Mahasiswa Baru
Semester 3–6 → Mahasiswa Aktif
Semester 7 ke atas → Mahasiswa Tingkat Akhir

4. Perulangan foreach

foreach ($mahasiswa as $kunci => $nilai):

foreach digunakan untuk menampilkan seluruh data yang ada di dalam array $mahasiswa secara otomatis. Jadi kita tidak perlu menulis satu per satu nama, NIM, prodi, dan sebagainya.

5. Validasi IPK — MODIFIKASI

if ($mahasiswa['ipk'] < 0 || $mahasiswa['ipk'] > 4) {
    $pesanIPK = 'IPK tidak valid.';
} else {
    $pesanIPK = 'IPK valid.';
}

Ini merupakan modifikasi ketiga berupa validasi. Karena rentang IPK adalah 0 sampai 4, program mengecek apakah nilai IPK berada dalam rentang tersebut.

<br>1. Error:

TypeError (Argument 1 passed to statusKelulusan() must be of type float, array given...)

2. Penyebab:

Parameter fungsi mengharapkan tipe data float, tetapi variabel yang dikirim ternyata array (misalnya salah mengambil indeks data $mahasiswa).

3. Perbaikan:

Pastikan argumen yang dilempar ke fungsi sesuai tipe datanya:

PHP
statusKelulusan((float)$mahasiswa['ipk'])

<br>SEBELUM MODIFIKASI (contoh4.php)
<img width="2142" height="1736" alt="bfr4" src="https://github.com/user-attachments/assets/b25677af-1daa-445f-8125-0f7eedb4145a" />
<img width="959" height="387" alt="image" src="https://github.com/user-attachments/assets/9d6d47e3-0ee0-4da2-a861-8205bac08760" />

SESUDAH MODIFIKASI (Tugas2bisahitung.php)
<img width="2942" height="2686" alt="aftr4" src="https://github.com/user-attachments/assets/33c1fee9-1773-42ab-b42c-f57e73ba68a2" />
<img width="775" height="272" alt="image" src="https://github.com/user-attachments/assets/bef7f9d9-ad86-425d-a5a0-16c7c46bda2c" />

PENJELASAN 5 BAGIAN PENTING
1. Interface BisaDihitung

Peran: Sebagai contract (kontrak) yang mewajibkan setiap kelas turunannya untuk mengimplementasikan method hargaAkhir(). Hal ini menerapkan prinsip Polymorphism sehingga objek apapun yang mengimplementasikan interface ini dapat diproses dengan cara yang seragam.

2. Constructor & Validasi (Produk::__construct)

Bagian Penting & Modifikasi: Penambahan parameter $kategori serta blok if ($harga <= 0).

Penjelasan: Bagian ini memastikan bahwa objek diinisialisasi dengan data yang valid sejak awal, mencegah bugs atau data korup akibat nilai harga yang negatif/nol.

3. Polymorphism pada Method hargaAkhir()

Bagian Penting & Modifikasi: Implementasi method hargaAkhir() di kelas Produk dan ProdukDiskon yang kini sama-sama memasukkan perhitungan PPN 11%, namun kelas ProdukDiskon menghitung diskon terlebih dahulu sebelum ditambah pajak.

Penjelasan: Menunjukkan fleksibilitas OOP di mana method yang sama (hargaAkhir) memberikan hasil atau perilaku kalkulasi yang berbeda sesuai bentuk objeknya (Dynamic Polymorphism).

4. Inheritance & parent::__construct pada ProdukDiskon

Bagian Penting & Modifikasi: Pewarisan dari kelas Produk ke ProdukDiskon dengan meneruskan parameter tambahan ($kategori) ke constructor induk.

Penjelasan: Memungkinkan kelas anak menggunakan kembali (reusability) properti dan method dari kelas induk tanpa harus menulis ulang kode yang sama.

5. Eksekusi Polimorfik dan Exception Handling (foreach & try-catch)

Bagian Penting & Modifikasi: Perulangan yang memproses beragam objek secara transparan serta blok try-catch.

Penjelasan: $produk->hargaAkhir() dieksekusi secara dinamis tergantung apakah ia instance dari Produk atau ProdukDiskon, sementara try-catch menangkap error validasi jika data yang dimasukkan tidak valid.

Contoh Error: 
<br>InvalidArgumentException
<br>1. Jenis ErrorUncaught InvalidArgumentException: Harga produk harus lebih besar dari 0.
<br>2. PenyebabnyaError ini terjadi ketika program menerima argumen atau nilai input yang tidak valid saat proses instansiasi objek (pembuatan objek dari kelas Produk atau ProdukDiskon).Pada kode modifikasi sebelumnya, kita menambahkan validasi berikut di dalam constructor:PHPif ($harga <= 0) {
    throw new InvalidArgumentException("Harga produk harus lebih besar dari 0.");
}
<br>Jika seseorang secara tidak sengaja memasukkan nilai harga $0$, negatif (misal -50000), atau memberikan nilai diskon melebihi $100\%$ (misal 120), maka program akan secara sengaja memicu exception ini untuk menghentikan data yang salah agar tidak masuk ke sistem perhitungan.
<br>3. Langkah PerbaikannyaAda dua langkah utama untuk mengatasi dan mencegah error ini:Validasi Sisi Input (Client/Form Data): Pastikan form atau data input dari pengguna divalidasi terlebih dahulu sebelum dikirim ke constructor kelas (misalnya menggunakan fungsi validasi input atau form validation di frontend/backend).Penerapan try-catch Block: Bungkus proses pembuatan objek dan eksekusi utama ke dalam blok try-catch agar jika data tidak valid, aplikasi tidak mengalami crash total, melainkan menampilkan pesan error yang ramah pengguna:PHPtry {
    $produk = new Produk('Keyboard', -50000); // Memicu error
} catch (InvalidArgumentException $e) {
    echo "Gagal menyimpan produk: " . $e->getMessage();
}
