<!DOCTYPE html>
<html lang="en">
<head>
    <title>Implementasi Model Prototipe Pada Digital Learning Management System (Di-Lemas)</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Siswa</title>
</head>
<body bgcolor="White">
<?php echo validation_errors(); ?>
<form action="<?= base_url('datasiswa/cetak'); ?>"method="post">
<th colspan="3" align="center"><h2>Implementasi Model Prototipe Pada Digital Learning Management System (Di-Lemas)</h2></th>
<table width="500" align="center" border="1">
    <tr><th colspan="3">Pengolahan Data siswa</th></tr>
    <tr><td>Nama</td><td><input type="text" name="nama" size="25" maxlength="50" placeholder="Masukan nama">
    <tr><td>NIS </td><td><input type=r="text" name="nis" size="10"/></td></tr>
    <tr><td>Kelas </td><td><input type=r="text" name="kelas" size="10"/></td></tr>
    <tr><td>Alamat</td><td><<textarea name="alamat" rows='5' cols='40'></textarea>
    <tr><td>Jenis Kelamin</td><td>
    <input type="radio" name="jeniskel" value="laki-laki">laki-laki
    <input type="radio" name="jeniskel" value="perempuan">perempuan</td>
    <tr><td>Tempat & Tanggal lahir </td><td><input type="text" name="tempat" size="10"><input type="date" size="30" name="ttl" /></td></tr>
    <tr><td>Agama</td><td>
        <select name="agama">
            <option value="-pilih-"></option>
            <option value="Islam">islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katholik">Katholik</option>
            <option value="Budha">Budha</option>
            <option value="Konghucu">Konghucu</option>
            <option value="Lain-lain">Lain-lain</option>
        </select>
        </td>
    </tr>
        <td>
        <input type="submit" value="kirim"><input type="reset" value="batal">
        </td>
    </tr>
</table>
</form>

</body>
</html>