<h2>Daftar Produk</h2>
<a href="index.php?aksi=create">Tambah Produk Baru</a>
<br><br>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($dataProduk)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
        <td><?= $row['stok']; ?></td>
        <td>
            <a href="index.php?aksi=edit&id=<?= $row['id']; ?>">Edit</a>
        </td>
    </tr>
    <?php } ?>
</table>