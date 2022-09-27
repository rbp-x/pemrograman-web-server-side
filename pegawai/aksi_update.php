<?php
// koneksi database
include 'koneksi.php';
// update data ke database
$id   =$_POST['id'];
$nama =$_POST['nama'];
$alamat=$_POST['alamat'];

mysqli_query($kon, "UPDATE pegawai SET nama='$nama',alamat='$alamat' WHERE id = $id");





// mengalihkan halaman kembali ke index.php
header("location:index.php");
?>