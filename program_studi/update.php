<?php
include "../koneksi.php";

$id          = $_POST['id'] ?? '';
$nama_prodi  = $_POST['nama_prodi'] ?? '';
$jenjang     = $_POST['jenjang'] ?? '';
$akreditasi  = $_POST['akreditasi'] ?? '';
$keterangan  = $_POST['keterangan'] ?? '';

// validasi
if ($id == '' || $nama_prodi == '' || $jenjang == '' || $akreditasi == '') {
    echo "<script>
            alert('Nama Prodi, Jenjang, dan Akreditasi wajib diisi');
            history.back();
          </script>";
    exit;
}

$query = "
    UPDATE program_studi 
    SET nama_prodi='$nama_prodi',
        jenjang='$jenjang',
        akreditasi='$akreditasi',
        keterangan='$keterangan'
    WHERE id='$id'
";

mysqli_query($koneksi, $query);

header("Location: list.php");
exit;
