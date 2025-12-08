<?php
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $old_nim   = $_POST['old_nim']; // nim lama
    $new_nim   = $_POST['nim'];     // nim baru
    $nama_mhs  = $_POST['nama_mhs'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = $_POST['alamat'];

    $update = mysqli_query($db,
        "UPDATE mahasiswa SET
            nim='$new_nim',
            nama_mhs='$nama_mhs',
            tgl_lahir='$tgl_lahir',
            alamat='$alamat'
         WHERE nim='$old_nim'"
    );

    if ($update) {
        header("Location: list.php?msg=update_sukses");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal mengupdate data: " . mysqli_error($db) . "</div>";
    }
}
?>
