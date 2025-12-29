<!DOCTYPE html>
<html>
<head>
  <title>Tambah Program Studi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Tambah Program Studi</h3>

  <form action="store.php" method="post">

    <div class="mb-3">
      <label class="form-label">Nama Program Studi</label>
      <input type="text" name="nama_prodi" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Jenjang</label>
      <select name="jenjang" class="form-select" required>
        <option value="">-- Pilih Jenjang --</option>
        <option value="D2">D2</option>
        <option value="D3">D3</option>
        <option value="D4">D4</option>
        <option value="S1">S1</option>
        <option value="S2">S2</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Akreditasi</label>
      <select name="akreditasi" class="form-select" required>
        <option value="">-- Pilih Akreditasi --</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label">Keterangan</label>
      <textarea name="keterangan" class="form-control" rows="3" placeholder="Masukkan keterangan program studi"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="list.php" class="btn btn-secondary">Kembali</a>

  </form>
</div>

</body>
</html>
