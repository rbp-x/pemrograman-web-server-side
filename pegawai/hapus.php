<?php
// koneksi database
include 'koneksi.php';
$id =$_GET['id'];

mysqli_query($kon,"DELETE FROM pegawai WHERE id=$id");
// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>
