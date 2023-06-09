<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Asisten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-md">
        <h2>Pendaftaran Asisten Praktikum</h2>
        <table class="table table-striped">
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas Praktikum</th>
                <th>IPK</th>
            </tr>
            <?php $iterator = 1;?>
            <?php foreach ($list as $d) : ?>
                <tr>
                    <td>
                        <?= $iterator++  ?>
                    </td>
                    <td>
                        <?= $d['NIM']; ?>
                    </td>
                    <td>
                        <?= $d['NAMA']; ?>
                    </td>
                    <td>
                        <?= $d['PRAKTIKUM']; ?>
                    </td>
                    <td>
                        <?= $d['IPK']; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <a href="/asisten/kembali">Kembali</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>