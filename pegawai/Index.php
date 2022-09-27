<html>
<body>
 <a href="tambah.php">+ Tambah Pegawai</a>
 <br>
 <br/>
 <table border="1">
 <tr>
 <th>NO</th>
 <th>ID</th>
 <th>Nama</th>
 <th>Alamat</th>
 <th>OPSI</th>
 </tr>
 <?php
 include 'koneksi.php';
 $no = 1;
 $data = mysqli_query($kon,"select * from pegawai");
 while($d = mysqli_fetch_array($data)){
 ?>
 <tr>
 <td><?php echo $no++; ?></td>
 <td><?php echo $d['id']; ?></td>
 <td><?php echo $d['nama']; ?></td>
 <td><?php echo $d['alamat']; ?></td>
 <td>
 <a href="edit.php?id=<?php echo $d['id']; ?>">EDIT</a>
 <a href="hapus.php?id=<?php echo $d['id']; ?>">HAPUS</a>
 </td>
 </tr>
 <?php
 }
 ?>
 </table>
 <a href="IndexPresensi.php" >
 <button type="button" class="btn btn-info">Presensi</button>
 </a>
 <a href="pres_hadir.php" >
 <button type="button" class="btn btn-info">Presensi Masuk</button>
 </a>
  <a href="prespulang.php" >
 <button type="button" class="btn btn-info">Presensi Pulang</button>
 </a>
</body>
</html>