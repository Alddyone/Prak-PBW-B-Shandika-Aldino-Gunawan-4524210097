<?php


function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

// Modifikasi: kondisi baru untuk status semester
function statusSemester(int $semester): string
{
    if ($semester <= 2) return 'Mahasiswa Baru';
    if ($semester <= 6) return 'Mahasiswa Aktif';
    return 'Mahasiswa Tingkat Akhir';
}

$mahasiswa = [
    'nim' => '2026001',
    'nama' => 'Raja Jossi',
    'prodi' => 'Teknik Informatika',
    'semester' => 5,
    'jenis_kelamin' => 'Laki-laki',
    'ipk' => 3.7
];

// Modifikasi: validasi IPK
if ($mahasiswa['ipk'] < 0 || $mahasiswa['ipk'] > 4) {
    $pesanIPK = 'IPK tidak valid.';
} else {
    $pesanIPK = 'IPK valid.';
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Biodata</title>
</head>

<body>
    <h1>Biodata Mahasiswa</h1>

    <ul>
        <?php foreach ($mahasiswa as $kunci => $nilai): ?>
            <li>
                <?= ucfirst($kunci) ?>:
                <?= htmlspecialchars((string)$nilai) ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <p>Predikat: <?= statusKelulusan($mahasiswa['ipk']) ?></p>

    <p>Status Semester: <?= statusSemester($mahasiswa['semester']) ?></p>

    <p><?= $pesanIPK ?></p>
</body>

</html>