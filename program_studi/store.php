<?php
include "../koneksi.php";

$nama_prodi  = $_POST['nama_prodi'] ?? '';
$jenjang     = $_POST['jenjang'] ?? '';
$akreditasi  = $_POST['akreditasi'] ?? '';
$keterangan  = $_POST['keterangan'] ?? '';

// validasi
if ($nama_prodi == '' || $jenjang == '' || $akreditasi == '') {
    echo "<script>
            alert('Nama Prodi, Jenjang, dan Akreditasi wajib diisi');
            history.back();
          </script>";
    exit;
}

// simpan data
mysqli_query(
    $koneksi,
    "INSERT INTO program_studi (nama_prodi, jenjang, akreditasi, keterangan)
     VALUES ('$nama_prodi', '$jenjang', '$akreditasi', '$keterangan')"
);

// redirect
header("Location: list.php");
exit;
