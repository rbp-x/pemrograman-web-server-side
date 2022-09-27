<?php
include_once 'koneksi.php';
if(isset($_POST['simpan']))
{	 
	 $id = $_POST['id'];
	 $nama = $_POST['nama'];
	 $alamat = $_POST['alamat'];
	 $tgl_lahir = $_POST['tanggal_lahir'];
	 $sql = "INSERT INTO pegawai (id,nama,alamat,tanggal_lahir) VALUES ('$id','$nama','$alamat',$tgl_lahir)";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}

//header("location:Index.php");
?>
