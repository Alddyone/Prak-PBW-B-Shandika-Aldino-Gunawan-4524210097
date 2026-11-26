<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Mahasiswa</h2>

    <!-- 1. TAMBAHAN: Menampilkan pesan error validasi CI4 -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/mahasiswa/simpan" method="post">
        <!-- 2. TAMBAHAN: CSRF token CI4 -->
        <?= csrf_field(); ?>

        NIM:
        <input type="text" name="nim" value="<?= old('nim'); ?>">
        <br><br>
        Nama:
        <input type="text" name="nama" value="<?= old('nama'); ?>">
        <br><br>
        Email:
        <input type="text" name="email" value="<?= old('email'); ?>">
        <br><br>
        Prodi:
        <input type="text" name="prodi" value="<?= old('prodi'); ?>">
        <br><br>
        IPK:
        <input type="text" name="ipk" value="<?= old('ipk'); ?>">
        <br><br>
        <button type="submit">Simpan</button>
        <a href="/mahasiswa">Kembali</a>
    </form>
</body>
</html>