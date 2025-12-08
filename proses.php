<?php
include "koneksi.php";

if (isset($_POST['submit'])) {

    $nim       = $_POST['nim'];
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $sql = mysqli_query($db, "INSERT INTO mahasiswa(nim, nama_mhs, tgl_lahir, alamat)
                              VALUES('$nim', '$nama_mhs', '$tgl_lahir', '$alamat')");

    if ($sql) {
        header("Location: list.php?msg=sukses");
    } else {
        header("Location: list.php?msg=gagal");
    }
}
?>
