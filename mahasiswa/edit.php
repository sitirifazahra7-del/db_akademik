<?php
include "../koneksi.php";

$nim = $_GET['nim'] ?? '';

if ($nim == '') {
    die("NIM tidak ditemukan");
}

// ambil data mahasiswa
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim='$nim'");
$mhs = mysqli_fetch_assoc($data);

if (!$mhs) {
    die("Data mahasiswa tidak ditemukan");
}

// ambil data prodi
$prodi = mysqli_query($koneksi, "SELECT * FROM program_studi");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Edit Mahasiswa</h3>

  <form action="update.php" method="post">

    <!-- PK -->
    <input type="hidden" name="nim_lama" value="<?= $mhs['nim']; ?>">

    <div class="mb-3">
      <label>NIM</label>
      <input type="text" value="<?= $mhs['nim']; ?>" class="form-control" readonly>
    </div>

    <div class="mb-3">
      <label>Nama Mahasiswa</label>
      <input type="text" name="nama_mhs" value="<?= $mhs['nama_mhs']; ?>" class="form-control">
    </div>

    <!-- TAMBAHAN -->
    <div class="mb-3">
      <label>Tanggal Lahir</label>
      <input type="date" name="tgl_lahir" value="<?= $mhs['tgl_lahir']; ?>" class="form-control">
    </div>

    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control" rows="3"><?= $mhs['alamat']; ?></textarea>
    </div>
    <!-- END TAMBAHAN -->

    <div class="mb-3">
      <label>Program Studi</label>
      <select name="program_studi" class="form-control">
        <?php while ($p = mysqli_fetch_assoc($prodi)) : ?>
          <option value="<?= $p['id']; ?>"
            <?= ($p['id'] == $mhs['program_studi']) ? 'selected' : ''; ?>>
            <?= $p['nama_prodi']; ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="list.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

</body>
</html>
