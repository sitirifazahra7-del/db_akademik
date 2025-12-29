<?php
include "../koneksi.php";

$query = "
SELECT mahasiswa.*, program_studi.nama_prodi
FROM mahasiswa
JOIN program_studi ON mahasiswa.program_studi = program_studi.id
";
$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

  <h3 class="mb-3">Data Mahasiswa</h3>

  <a href="form.php" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>

  <table class="table table-bordered table-striped">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama Mahasiswa</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Program Studi</th>
        <th width="150">Aksi</th>
      </tr>
    </thead>

    <tbody>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($data)) : ?>
      <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nim']; ?></td>
        <td><?= $row['nama_mhs']; ?></td>
        <td><?= $row['tgl_lahir']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['nama_prodi']; ?></td>
        <td>
          <a href="edit.php?nim=<?= urlencode($row['nim']); ?>" 
             class="btn btn-warning btn-sm">Edit</a>

          <a href="hapus.php?nim=<?= urlencode($row['nim']); ?>" 
             onclick="return confirm('Yakin hapus data ini?')" 
             class="btn btn-danger btn-sm">Hapus</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>

  <!-- TOMBOL KEMBALI -->
  <div class="mt-3">
    <button onclick="window.location.href='../index.php'" 
            class="btn btn-secondary">
      Kembali
    </button>
  </div>

</div>

</body>
</html>
