<?php
// kalkulator.php
$hasil = null;
$pesan = '';
$nama = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'] ?? '';
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $operator = $_POST['operator'] ?? '';

    // Validasi input angka
    if ($a === '' || $b === '') {
        $pesan = 'Angka pertama dan kedua harus diisi.';
    } else {
        $a = (float) $a;
        $b = (float) $b;

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
                if ($b == 0) {
                    $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
                } else {
                    $hasil = $a / $b;
                }
                break;

            case '^':
                $hasil = $a ** $b;
                break;

            default:
                $pesan = 'Operator tidak valid.';
        }
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
</head>

<body>
    <h1>Kalkulator Sederhana</h1>

    <form method="post">

        <label>Nama:</label>
        <input type="text" name="nama" required>
        <br><br>

        <input type="number" step="any" name="a" required>

        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="^">Pangkat</option>
        </select>

        <input type="number" step="any" name="b" required>

        <button type="submit">Hitung</button>
    </form>

    <?php if ($pesan): ?>
        <p><?= htmlspecialchars($pesan) ?></p>

    <?php elseif ($hasil !== null): ?>
        <p>
            Halo, <?= htmlspecialchars($nama) ?>!
            Hasil: <?= htmlspecialchars((string)$hasil) ?>
        </p>
    <?php endif; ?>

</body>

</html>