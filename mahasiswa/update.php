<?php
include "../koneksi.php";

$nim_lama      = $_POST['nim_lama'] ?? '';
$nama_mhs      = $_POST['nama_mhs'] ?? '';
$tgl_lahir     = $_POST['tgl_lahir'] ?? '';
$alamat        = $_POST['alamat'] ?? '';
$program_studi = $_POST['program_studi'] ?? '';

if (
    $nim_lama == '' ||
    $nama_mhs == '' ||
    $tgl_lahir == '' ||
    $alamat == '' ||
    $program_studi == ''
) {
    echo "<script>alert('Data tidak lengkap');history.back();</script>";
    exit;
}

$query = "
UPDATE mahasiswa SET
    nama_mhs='$nama_mhs',
    tgl_lahir='$tgl_lahir',
    alamat='$alamat',
    program_studi='$program_studi'
WHERE nim='$nim_lama'
";

mysqli_query($koneksi, $query);
header("Location: list.php");
exit;
