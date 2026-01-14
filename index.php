<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php"); 
    exit;
}

include "koneksi.php";

$jumlah_mahasiswa = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM mahasiswa"));
$jumlah_prodi     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM program_studi"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Akademik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Sistem Akademik</a>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- PROFILE DI UJUNG KIRI -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
            Profile
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="editprofile.php">Edit Profil</a></li>
          </ul>
        </li>
      </ul>

      <!-- MENU YANG SUDAH ADA -->
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item">
          <span class="navbar-text text-white me-3">
            Login: <b><?= $_SESSION['email'] ?? 'User'; ?></b>
          </span>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="index.php">Dashboard</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="mahasiswa/list.php">Mahasiswa</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="program_studi/list.php">Program Studi</a>
        </li>

        <li class="nav-item">
          <a class="btn btn-danger btn-sm ms-2" href="logout.php"
             onclick="return confirm('Yakin ingin logout?')">
            Logout
          </a>
        </li>
      </ul>

    </div>
  </div>
</nav>

<div class="container mt-4">
  <h3 class="mb-4">Selamat Datang</h3>
  <div class="row">
    <div class="col-md-6">
      <div class="card text-white bg-success mb-3">
        <div class="card-body">
          <h5 class="card-title">Jumlah Mahasiswa</h5>
          <h2><?= $jumlah_mahasiswa; ?></h2>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card text-white bg-info mb-3">
        <div class="card-body">
          <h5 class="card-title">Jumlah Program Studi</h5>
          <h2><?= $jumlah_prodi; ?></h2>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
