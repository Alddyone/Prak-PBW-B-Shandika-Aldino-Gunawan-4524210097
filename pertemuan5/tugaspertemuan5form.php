<form action="tugaspertemuan5simpan.php" method="post">
    NIM:
    <input type="text" name="nim" required>
    <br><br>

    Nama:
    <input type="text" name="nama" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Prodi:
    <select name="prodi" required>
        <option value="">Pilih Prodi</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
        <option value="Manajemen">Manajemen</option>
    </select>
    <br><br>

    Angkatan:
    <input type="number" name="angkatan"
           min="2000" max="2099" required>
    <br><br>

    IPK:
    <input type="number" name="ipk"
           min="0" max="4" step="0.01" required>
    <br><br>

    <button type="submit">Simpan</button>
</form>
