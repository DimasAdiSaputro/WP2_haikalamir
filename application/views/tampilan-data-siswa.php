<?php
error_reporting (0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data siswa</title>
</head>
<body>
<table width="500" align="center" border="1">
    <tr><th colspan="3">Data siswa</th></tr>
    <tr><td>Nama</td><td>:</td><td><?=$_POST['nama']; ?></td></tr>
    <tr><td>NIS</td><td>:</td><td><?=$_POST['nis']; ?></td></tr>
    <tr><td>Kelas</td><td>:</td><td><?=$_POST['kelas']; ?></td></tr>
    <tr><td>Alamat</td><td>:</td><td><?= $_POST['alamat']; ?></td></tr>
    <tr><td>Jeniskel</td><td>:</td><td><?= $_POST['jeniskel']; ?></td></tr>
    <tr><td>TTL</td><td>:</td><td><?=$_POST['ttl']; ?></td></tr>
    <tr><td>Agama</td><td>:</td><td><?= $_POST['agama']; ?></td></tr> 
    <tr><td colspan="3"><a href="<?= base_url('datasiswa'); ?>">Input form pada point 2</a>
</table>
</body>
</html>