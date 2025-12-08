<!DOCTYPE html>
<html>
<head>
    <title>List Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-4">Data Mahasiswa</h3>

    <?php if(isset($_GET['msg'])) {
        if($_GET['msg']=="sukses") { ?>
            <div class="alert alert-success">Data berhasil disimpan!</div>
        <?php } else { ?>
            <div class="alert alert-danger">Gagal menyimpan data.</div>
        <?php } 
    } ?>

    <a href="form.php" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

    <table class="table table-bordered table-hover bg-white shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php
        include "koneksi.php";
        $query = mysqli_query($db, "SELECT * FROM mahasiswa");

        while ($d = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?= $d['nim'] ?></td>
                <td><?= $d['nama_mhs'] ?></td>
                <td><?= $d['tgl_lahir'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td>
                    <a href="edit.php?nim=<?= $d['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="hapus.php?nim=<?= $d['nim'] ?>" 
                       onclick="return confirm('Yakin ingin hapus?')"
                       class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>

    </table>
</div>

</body>
</html>
