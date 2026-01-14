<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

if (!isset($_POST['nama'])) {
    die("Akses tidak valid");
}

$email = $_SESSION['email'];
$nama  = mysqli_real_escape_string($koneksi, $_POST['nama']);
$password = $_POST['password'];

if (!empty($password)) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE pengguna 
            SET nama='$nama', password='$password_hash'
            WHERE email='$email'";
} else {
    $sql = "UPDATE pengguna 
            SET nama='$nama'
            WHERE email='$email'";
}

$query = mysqli_query($koneksi, $sql);

if ($query) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal update profil<br>";
    echo mysqli_error($koneksi);
}
