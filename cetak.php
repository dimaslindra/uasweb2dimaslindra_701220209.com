<?php include("footer.php");
require 'functions.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cetak</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background: #dedede;
        }

        h2 {
            color: white;
            font-size: 40px;
            background: blue;
            width: 100%;
            padding: 15px;
            text-align: center;
        }

        th {
            color: white;
            font-weight: bold;
            background: green;
            font-size: 25px;
        }

        tr {
            margin: auto;
            text-align: center;
            align-items: center;
        }

        td {
            color: black;
            font-weight: bold;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        .kembali {
            background: blue;
            margin: auto;
            display: block;
            padding: 10px 50px;
            border: transparent;
            border-radius: 5px;
        }

        .kembali:hover {
            background: white;
        }

        i {
            margin: auto;
            font-size: 35px;
        }

        i:hover {
            color: blue;
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <h2>Data Buku Perpustakaan Online</h2>
    <table border="1" cellpadding="10" style="background: white; box-shadow: 0 0 10px rgba(1, 1, 1, 0.8); width: 80%;">
        <tr>
            <th>No</th>
            <th>Jenis Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun Terbit</th>
            <th>Buku</th>
        </tr>

        <?php $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?> </td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
                <td><?= $row["universitas"]; ?></td>
                <td><img src="img/<?php echo $row["gambar"]; ?> " width="50"></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>
    </table>
    <script>
        window.print();
    </script>
    <br>
    <button class="kembali"><a href="admin_admin.php"><i class='bx bx-arrow-back'></i></a></button>
</body>

</html>
