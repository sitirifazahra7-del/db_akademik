<?php
include "../koneksi.php";

$nim = $_GET['nim'] ?? '';

if ($nim == '') {
    die("NIM tidak ditemukan");
}

// hapus data mahasiswa
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE nim='$nim'");

header("Location: list.php");
exit;
