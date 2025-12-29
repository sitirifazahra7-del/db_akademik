<?php
session_start();

// Proteksi halaman: Jika belum login, tendang ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// Menghitung data secara dinamis dari tabel yang Anda miliki
$query_mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
$jml_mahasiswa = mysqli_num_rows($query_mhs);

$query_prodi = mysqli_query($koneksi, "SELECT * FROM program_studi");
$jml_prodi = mysqli_num_rows($query_prodi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .hero-section { background-color: #e9ecef; border-radius: 15px; padding: 3rem 0; margin-bottom: 2rem; }
        .card-stat { border: none; border-radius: 15px; transition: transform 0.3s; }
        .card-stat:hover { transform: translateY(-5px); }
        .logo-img { max-width: 150px; height: auto; margin-bottom: 1rem; } /* Gaya untuk gambar logo */
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="home.php">SISFO AKADEMIK</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="home.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="mahasiswa/index.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="program_studi/index.php">Program Studi</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> <?php echo $_SESSION['nama']; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="logout.php" onclick="return confirm('Yakin ingin keluar?')">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row mb-4">
        <div class="col">
            <div class="hero-section text-center shadow-sm">
                <div class="container-fluid py-2">
                    <img src="pnp.jpg" alt="pnp" class="pnp-img">
                    <h1 class="display-5 fw-bold">Selamat Datang, <?php echo $_SESSION['nama']; ?>!</h1>
                    <p class="fs-4 text-muted">Anda login sebagai: <?php echo $_SESSION['email']; ?></p>
                    <hr class="my-4">
                    <p>Gunakan panel di bawah untuk melihat statistik ringkas sistem akademik Anda.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card card-stat bg-success text-white shadow">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Total Mahasiswa</h6>
                            <h2 class="display-4 fw-bold mb-0"><?php echo $jml_mahasiswa; ?></h2>
                        </div>
                        <i class="bi bi-people-fill display-1 opacity-50"></i>
                    </div>
                    <a href="mahasiswa/index.php" class="text-white mt-3 d-inline-block text-decoration-none small">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-stat bg-info text-white shadow">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase mb-2">Program Studi</h6>
                            <h2 class="display-4 fw-bold mb-0"><?php echo $jml_prodi; ?></h2>
                        </div>
                        <i class="bi bi-book-half display-1 opacity-50"></i>
                    </div>
                    <a href="program_studi/index.php" class="text-white mt-3 d-inline-block text-decoration-none small">
                        Lihat Detail <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>