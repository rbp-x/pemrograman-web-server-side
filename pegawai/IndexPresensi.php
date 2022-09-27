<!DOCTYPE html>
<html lang="en">
<head>
 <title>Presensi</title>

</head>
<body>
<?php
include 'koneksi.php';
//realsi tabel presensi dan pegawai//

 $data=mysqli_query($kon,"SELECT presensi.pegawai_id, pegawai.nama, presensi.tanggal,
 presensi.jam_datang,presensi.jam_pulang, presensi.status
 FROM presensi, pegawai WHERE presensi.pegawai_id=pegawai.id
 ORDER BY presensi.tanggal");
 
?>

<div class="container">
<h2>Daftar Presensi Pegawai</h2>
 <a href="pres_hadir.php" >
 <button type="button" class="btn btn-info">Presensi Datang</button>
 </a> 
 <a href="presPulang.php" >
 <button type="button" class="btn btn-info">Presensi Pulang</button>
 </a> 
 <table class="table table-bordered table-sm" border="2">
 <thead>
 <tr border=2>
 <th border=bold>No</th>
 <th>No Pegawai</th>
 <th>Nama</th>
 <th>Tanggal</th>
 <th>Jam Datang</th>
 <th>Jam Pulang</th>
 <th>Jumlah Jam</th>
 <th>Status</th>
 </tr>
 </thead>
 <tbody>
 <?php
 $i=1;
 while($d = mysqli_fetch_array($data)){ ?>
 <tr>
 <td><?php echo $i++; ?> </td>
 <td><?php echo $d["pegawai_id"]; ?> </td>
 <td><?php echo $d["nama"]; ?> </td>
 <td><?php echo $d["tanggal"]; ?> </td>
 <td><?php echo date("Y-m-d H:m:s",strtotime($d["jam_datang"])); ?> </td>
 <td><?php echo date("Y-m-d H:m:s",strtotime($d["jam_pulang"])); ?> </td>
 <?php
 $jamMn=strtotime($d["jam_pulang"])-strtotime($d["jam_datang"]);
 ?>
 <td><?php echo dtkToJMD($jamMn); ?> </td>
 <td><?php echo status($d["status"]); ?> </td>
 </tr>
 <?php } ?> 
 </tbody>
 </table>
</div>
</body>
</html>
<?php
//fungsi membaca status
function status($st)
{
 if ($st=="H")
 return "Hadir";
 else if ($st=="I")
 return "ijin";
 else
 return "Alpha"; 
}
//fungsi menngubah nilai integer (detik)
//menjadi jam:menit:detik
//contoh 08:12:45
//======================================
function dtkToJMD($dtk)
 {
 $jam = floor($dtk/3600);
 $menit=floor ($dtk%3600/60);
 $detik=floor (($dtk%3600)%60);
 return duaDigit($jam).':'.duaDigit($menit).':'.duaDigit($detik);
 }
 
// manuliskan angka desimal 1 digit menjadi 2 digit
// contoh angka desimal 1, manjadi 01 
//================================================
function duaDigit($s)
 {
 if (strlen($s)==1)
 return "0".$s;
 else return $s; 
 }
?>