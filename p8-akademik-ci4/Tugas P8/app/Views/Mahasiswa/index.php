<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <!-- 1. TAMBAHAN: Pesan sukses setelah tambah / ubah / hapus -->
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= esc(session()->getFlashdata('success')); ?></p>
    <?php endif; ?>

    <a href="/mahasiswa/tambah">Tambah Mahasiswa</a>
    <br><br>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Prodi</th>
            <th>IPK</th>
            <!-- 2. TAMBAHAN: Kolom Aksi -->
            <th>Aksi</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
        <tr>
            <td><?= esc($mhs['nim']); ?></td>
            <td><?= esc($mhs['nama']); ?></td>
            <td><?= esc($mhs['email']); ?></td>
            <td><?= esc($mhs['prodi']); ?></td>
            <td><?= esc($mhs['ipk']); ?></td>
            <!-- 3. TAMBAHAN: Tombol Edit dan Hapus -->
            <td>
                <a href="/mahasiswa/edit/<?= esc($mhs['nim']); ?>">Edit</a> |
                <form action="/mahasiswa/delete/<?= esc($mhs['nim']); ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <?= csrf_field(); ?>
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>