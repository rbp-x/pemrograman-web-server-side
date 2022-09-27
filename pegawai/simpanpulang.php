<?php
// koneksi database
include 'koneksi.php';
//simpan data ke tabel
date_default_timezone_set('Asia/Jakarta');
$pegawai_id = $_POST['pegawai_id'];
$jamPulang = date('Y-m-d h:i:s');
$tanggal = date('Y-m-d');
$sql = "UPDATE presensi SET jam_pulang='$jamPulang' WHERE pegawai_id='$pegawai_id' AND tanggal='$tanggal'";
$query = mysqli_query($kon, $sql) or die (mysqli_error());
if($query){
 echo "Berhasil presensi pulang";
} else {
 echo "Error :".$sql."<br>".mysqli_error($kon);
}
 mysqli_close($kon); 
header("location:index.php");
?>