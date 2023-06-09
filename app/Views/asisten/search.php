<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/asisten/search" method="post">
        <?= csrf_field() ?>
        Search : <input type="text" name="key" />
        <input type="submit" name= "submit" value="search">
    </form>
    <?php 
        if(!empty($hasil)){
            echo "<h1>Hasil Pencarian</h1>";
            echo "Nim : ".$hasil['NIM'];
            echo "<br>Nama : ".$hasil['NAMA'];
            echo "<br>Praktikum : ".$hasil['PRAKTIKUM'];
            echo "<br>Ipk : ".$hasil['IPK'];
        }
    ?>
    <br><a href="/asisten/kembali">Kembali</a>
</body>
</html>