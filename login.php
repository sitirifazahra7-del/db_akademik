<?php
session_start();
require "koneksi.php"; // Pastikan file ini ada di folder yang sama

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil input dan mencegah SQL Injection
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];

    // Query mencari user berdasarkan email saja dulu
    $query  = "SELECT * FROM pengguna WHERE email = '$email'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        
        // VERSI A: Jika password di database menggunakan MD5
        if (md5($password) === $row['password']) {
            $_SESSION['login'] = true;
            $_SESSION['id']    = $row['id'];   // Sesuai kolom 1
            $_SESSION['nama']  = $row['nama']; // Sesuai kolom 4
            $_SESSION['email'] = $row['email'];
            
            header("Location: index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak terdaftar!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .card { border-radius: 15px; border: none; }
        .btn-primary { border-radius: 8px; padding: 10px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h5 class="mb-0">Masuk ke Sistem</h5>
                </div>
                <div class="card-body p-4">
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger text-center small"><?= $error; ?></div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>