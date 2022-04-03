<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Matakuliah</title>
</head>
<body>
    <center>
    
    <table>
        <tr>
            <th colspan="3">Form Data Mata Kuliah</th>
        </tr>
        <tr>
            <th colspan="3"><hr></th>
        </tr>
        <tr>
            <th>Kode MTK</th>
            <th>:</th>
            <th><?= $Kode;?></th>
        </tr>
        <tr>
            <th>Nama</th>
            <th>:</th>
            <th><?= $Nama;?></th>
        </tr>
        <tr>
            <th>SKS</th>
            <th>:</th>
            <th><?=$SKS;?>
        </th>
        </tr>
        <tr>
            <th colspan="3"><a href="<?= base_url();?>Matakuliah/cetak" title = "Kembali">Kembali</a></th>
        </tr>
    </table>    
    
    </center>
</body>
</html>