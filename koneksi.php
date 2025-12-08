<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "db_akademik";

$db = mysqli_connect($server, $user, $password, $dbname);

if (!$db) {
    die("Gagal terhubung: " . mysqli_connect_error());
}
?>
