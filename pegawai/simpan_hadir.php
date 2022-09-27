<?php
//seting jam tanggal menurut zona waktu setempat
date_default_timezone_set('Asia/Jakarta');
// koneksi database
include 'koneksi.php';
//simpan data ke tabel
$pegawai_id = $_POST['pegawai_id'];
$jamDatang = date('Y-m-d h:i:s'); 
$jamPulang = date('Y-m-d h:i:s');
$tanggal = date('Y-m-d');
$sql = "INSERT INTO presensi (pegawai_id, tanggal, jam_datang, jam_pulang, status)
 VALUES('$pegawai_id','$tanggal','$jamDatang','$jamPulang','H')";
$query = mysqli_query($kon, $sql) or die (mysqli_error());
if($query){
 echo "berhasil Presensi Datang";
} else {
 echo "Error :".$sql."<br>".mysqli_error($kon);
}
mysqli_close($kon);
header("location:index.php");
?>
