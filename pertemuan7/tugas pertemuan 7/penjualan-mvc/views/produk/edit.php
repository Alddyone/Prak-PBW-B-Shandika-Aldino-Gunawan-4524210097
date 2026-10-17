<h2>Edit Produk</h2>
<form action="" method="POST">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" value="<?= $produk['nama_produk']; ?>" required><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?= $produk['harga']; ?>" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= $produk['stok']; ?>" required><br><br>

    <button type="submit" name="submit">Update</button>
    <a href="index.php">Kembali</a>
</form>