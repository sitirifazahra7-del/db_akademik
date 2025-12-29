<?php
include "../koneksi.php";
$data = mysqli_query($koneksi, "SELECT * FROM program_studi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-3">Data Program Studi</h3>

    <a href="form.php" class="btn btn-success mb-3">+ Tambah Program Studi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Program Studi</th>
                <th>Jenjang</th>
                <th>Akreditasi</th>
                <th>Keterangan</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($data) > 0): ?>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($data)): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama_prodi']; ?></td>
                    <td><?= $row['jenjang']; ?></td>
                    <td><?= $row['akreditasi'] ?? '-'; ?></td>
                    <td><?= $row['keterangan'] ?? '-'; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus.php?id=<?= $row['id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                           Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data belum ada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="../index.php" class="btn btn-secondary">Kembali</a>

</body>
</html>
