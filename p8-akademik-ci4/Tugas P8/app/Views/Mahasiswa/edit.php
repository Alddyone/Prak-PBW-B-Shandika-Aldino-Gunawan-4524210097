<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Mahasiswa</h2>

    <!-- Menampilkan pesan error validasi CI4 -->
    <?php if (session()->getFlashdata('errors')): ?>
        <div style="color: red;">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/mahasiswa/update/<?= esc($mahasiswa['nim']); ?>" method="post">
        <?= csrf_field(); ?>

        NIM:
        <input type="text" name="nim" value="<?= old('nim', $mahasiswa['nim']); ?>">
        <br><br>
        Nama:
        <input type="text" name="nama" value="<?= old('nama', $mahasiswa['nama']); ?>">
        <br><br>
        Email:
        <input type="text" name="email" value="<?= old('email', $mahasiswa['email']); ?>">
        <br><br>
        Prodi:
        <input type="text" name="prodi" value="<?= old('prodi', $mahasiswa['prodi']); ?>">
        <br><br>
        IPK:
        <input type="text" name="ipk" value="<?= old('ipk', $mahasiswa['ipk']); ?>">
        <br><br>
        <button type="submit">Update</button>
        <a href="/mahasiswa">Kembali</a>
    </form>
</body>
</html>