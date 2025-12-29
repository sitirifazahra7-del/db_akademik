<?php
include "../koneksi.php";
$prodi = mysqli_query($koneksi, "SELECT id, nama_prodi, jenjang FROM program_studi");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3 class="mb-4">Tambah Mahasiswa</h3>

    <form action="proses.php" method="post">

        <div class="mb-3">
            <label class="form-label">NIM</label>
            <input type="text" name="nim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <input type="text" name="nama_mhs" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Program Studi</label>
            <select name="program_studi" class="form-select" required>
                <option value="">-- Pilih Prodi --</option>
                <?php while ($p = mysqli_fetch_assoc($prodi)) : ?>
                    <option value="<?= $p['id']; ?>">
                        <?= $p['nama_prodi']; ?> (<?= $p['jenjang']; ?>)
                    </option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="list.php" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
