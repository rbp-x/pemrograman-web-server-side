<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form input-barang 
$id=$_POST["id"];
$nama=$_POST["nama"];
$alamat=$_POST["alamat"];

//Query input menginput data kedalam tabel barang
  $sql="insert into pegawai (id,nama,alamat) values
		('$id','$nama','$alamat')";

//Mengeksekusi/menjalankan query diatas	
  $kons=mysqli_query($kon,$sql);

//Kondisi apakah berhasil atau tidak
  if ($kons) {
	echo "Berhasil insert data";
	exit;
  }
else {
	echo "Gagal insert data";
	exit;
}  


?>