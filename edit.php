<?php
include "koneksi.php";

$nim = $_GET['nim'];
$q = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$data = mysqli_fetch_array($q);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h4>Edit Data Mahasiswa</h4>
        </div>

        <div class="card-body">

            <form action="update.php" method="POST">

                <!-- Kirim nim lama -->
                <input type="hidden" name="old_nim" value="<?= $data['nim'] ?>">

                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control"
                           value="<?= $data['nim'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" class="form-control"
                           value="<?= $data['nama_mhs'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control"
                           value="<?= $data['tgl_lahir'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required><?= $data['alamat'] ?></textarea>
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
                <a href="list.php" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>
</div>

</body>
</html>
