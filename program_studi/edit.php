<?php
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM program_studi WHERE id='$id'");
$prodi = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Program Studi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Edit Program Studi</h3>

  <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?= $prodi['id']; ?>">

    <div class="mb-3">
      <label class="form-label">Nama Program Studi</label>
      <input type="text" name="nama_prodi"
             value="<?= $prodi['nama_prodi']; ?>"
             class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jenjang</label>
      <select name="jenjang" class="form-select" required>
        <option value="">-- Pilih Jenjang --</option>
        <option value="D2" <?= ($prodi['jenjang']=='D2')?'selected':''; ?>>D2</option>
        <option value="D3" <?= ($prodi['jenjang']=='D3')?'selected':''; ?>>D3</option>
        <option value="D4" <?= ($prodi['jenjang']=='D4')?'selected':''; ?>>D4</option>
        <option value="S1" <?= ($prodi['jenjang']=='S1')?'selected':''; ?>>S1</option>
        <option value="S2" <?= ($prodi['jenjang']=='S2')?'selected':''; ?>>S2</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Akreditasi</label>
      <select name="akreditasi" class="form-select" required>
        <option value="">-- Pilih Akreditasi --</option>
        <option value="A" <?= ($prodi['akreditasi']=='A')?'selected':''; ?>>A</option>
        <option value="B" <?= ($prodi['akreditasi']=='B')?'selected':''; ?>>B</option>
        <option value="C" <?= ($prodi['akreditasi']=='C')?'selected':''; ?>>C</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan"
                class="form-control"
                rows="3"
                placeholder="Masukkan keterangan program studi"><?= $prodi['keterangan'] ?? ''; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="list.php" class="btn btn-secondary">Batal</a>
  </form>
</div>

</body>
</html>
