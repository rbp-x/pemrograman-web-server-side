<html>
<head>
    <title>Presensi Pegawai</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="card">
            <h2>Membuat Rekap Presensi Perpegawai</h2>
            <form action="lapRekap.php" method="POST" >
            <div class="form-group">
            <label for="pegawai_id">Nomor Pegawai:</label>
            <input type="number" class="form-control" id="pegawai_id" name="pegawai_id">
            <label for="tanggal_awal">Dari Tanggal :</label>
            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
            <label for="tanggal_akhir">Sampai Tanggal :</label>
            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
            <br>
            <button type="submit" class="btn btn-primary">Proses</button>
            </form>
        </div>
    </div>
</body>
</html>