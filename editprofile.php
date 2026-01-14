<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

$email = $_SESSION['email'];
$query = mysqli_query($koneksi, "SELECT * FROM pengguna WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h3>Edit Profil</h3>

  <form action="updateprofile.php" method="post">
    
    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" value="<?= $user['email']; ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control"
             value="<?= $user['nama']; ?>" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password Baru</label>
      <input type="password" name="password" class="form-control">
      <small class="text-muted">
        Kosongkan jika tidak ingin mengubah password
      </small>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

</body>
</html>
