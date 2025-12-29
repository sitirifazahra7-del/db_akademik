<?php
include "../koneksi.php";

$nim    = $_POST['nim'];
$nama   = $_POST['nama_mhs'];
$tgl    = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$prodi  = $_POST['program_studi'];

mysqli_query($koneksi, "
INSERT INTO mahasiswa (nim, nama_mhs, tgl_lahir, alamat, program_studi)
VALUES ('$nim', '$nama', '$tgl', '$alamat', '$prodi')
");

header("Location: list.php");
