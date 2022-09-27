<body>
 <a href="index.php">KEMBALI</a>
 <br/>
 <br/>
 <h3>EDIT DATA PEGAWAI</h3>
 <?php
 include 'koneksi.php';
 $id = $_GET['id'];
 $data = mysqli_query($kon,"select * from pegawai where id='$id'");
 while($d = mysqli_fetch_array($data)){
 ?>
 <form method="post" action="aksi_update.php">
 <table>
 <tr> 
 <td>Nama</td>
 <td>
 <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
 <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
 </td>
 </tr>
 <td>Alamat</td>
 <td><input type="text" name="alamat" value="<?php echo $d['alamat'];
?>"></td>
 </tr>
 <tr> 
 <td><input type="submit" value="SIMPAN"></td>
 </tr> 
 </table>
 </form>
 <?php
 }
 ?>
</body>
</html>