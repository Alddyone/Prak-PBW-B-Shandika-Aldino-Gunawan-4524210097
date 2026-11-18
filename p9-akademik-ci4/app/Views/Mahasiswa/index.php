<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa</h2>
        <a href="<?= base_url('mahasiswa/tambah'); ?>" class="btn btn-primary">Tambah Mahasiswa</a>
        <br><br>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>IPK</th>
                </tr>
                <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?= esc($mhs['nim']); ?></td>
                    <td><?= esc($mhs['nama']); ?></td>
                    <td><?= esc($mhs['email']); ?></td>
                    <td><?= esc($mhs['prodi']); ?></td>
                    <td><?= esc($mhs['angkatan']); ?></td>
                    <td><?= esc($mhs['ipk']); ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>
</html>