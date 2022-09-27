<!DOCTYPE html>
<html lang="en">
<head>
    <title>Presensi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        include 'koneksi.php';
        $id=$_POST['pegawai_id'];
 	    $data1 = mysqli_query($db,"select * from pegawai where id='$id'");
        
         while($p = mysqli_fetch_array($data1))
         { 
          $pegawai_id = $p["id"];
          $nama       = $p["nama"];
        }
   
        $tanggal_awal=$_POST['tanggal_awal'];
        $tanggal_akhir=$_POST['tanggal_akhir'];

        $data2 = mysqli_query($db,"SELECT pegawai_id, tanggal, jam_datang, jam_pulang
                                   FROM presensi  WHERE pegawai_id='$id' 
                                    AND tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
    ?>

<div class="container">
    <center>
        <h4>REKAP PRESENSI KEHADIRAN PER PEGAWAI</h4>
    </center>
    <table>
        <tr>
            <td>No Pegawai :</td>
            <td><?php echo $id;?></td>
        </tr>
        <tr>
            <td>Nama :</td>
            <td><?php echo $nama;?></td>
        </tr>
        <tr>
            <td>Periode tanggal :</td>
            <td><?php echo $tanggal_awal;?></td>
            <td>sampai dengan tanggal :</td>
            <td><?php echo $tanggal_akhir;?></td>
        </tr>
    </table>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal/Hari</th>
                <th>Jam Datang</th>
                <th>Jam Pulang</th>
                <th>Jumlah Jam Kerja</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                $jumlah=0;
                while($d = mysqli_fetch_array($data2)){ ?>
                <tr>
                    <td><?php echo $i++; ?> </td>
                    <td><?php echo $d["tanggal"]; ?> </td>
                    <td><?php echo date("Y-m-d H:m:s",strtotime($d["jam_datang"])); ?> </td>
                    <td><?php echo date("Y-m-d H:m:s",strtotime($d["jam_pulang"])); ?> </td>
                    <?php
                        $jamMn=strtotime($d["jam_pulang"])-strtotime($d["jam_datang"]);
                        $jumlah+=$jamMn;
                    ?>
                    <td><?php echo dtkToJMD($jamMn); ?> </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Jumlah Jam </td>
                <td><?php echo dtkToJMD($jumlah); ?></td>
            </tr>
        </tfoot>
        </table>
   </div>
</body>
</html>

<?php
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