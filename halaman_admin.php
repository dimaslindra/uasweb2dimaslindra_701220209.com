<?php

include("header.php");
if (!in_array("spp", $_SESSION['admin_akses'])) {
    echo "kamu tidak memiliki akses";
    include("footer.php");
    exit();
}

include("footer.php");
require 'functions.php';

if (isset($_POST["cari"])) {
    $keyword = mysqli_real_escape_string($conn, $_POST["keyword"]);
    $query = "SELECT * FROM mahasiswa WHERE
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' OR
              jurusan LIKE '%$keyword%' OR
              universitas LIKE '%$keyword%' OR
              idbuku LIKE '%$keyword%' OR
              jumlahalaman LIKE '%$keyword%' OR
              penerbit LIKE '%$keyword%'";
    $result = mysqli_query($conn, $query);
} else {
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku Perpustakaan Online</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #dedede;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            font-size: 53.5px;
            font-family: 'Arial', sans-serif;
        }

        th {
            color: #fff;
            font-weight: bold;
            background: #007BFF;
            font-size: 18px;
            padding: 15px;
        }

        tr {
            text-align: center;
            background: white;
            font-weight: bold;
        }

        td {
            color: #333;
            padding: 10px;
        }

        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
            box-shadow: 0 0 10px rgba(1, 1, 1, 0.8);
        }

        #btn-2,
        .cetak {
            padding: 15px 350px;
            margin: 10px;
            display: flex;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(1, 1, 1, 0.8);
            text-decoration: none;
            color: white;
            text-align: center;
            font-size: 16px;
            border: transparent;
            margin: auto;
        }

        #btn-2 {
            background: #28A745;
        }

        #btn-2:hover {
            background: red;
            transform: scale(1.03);
        }

        .cetak {
            background: #007BFF;
        }

        .cetak:hover {
            background: red;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            font-size: 18px;
        }

        a:hover {
            color: red;
        }

        i {
            font-size: 20px;
        }

        c {
            color: white;
        }

        c:hover {
            color: #DC3545;
        }

        .read {
            margin: auto;
            display: block;
            display: flex;
            width: 30%;
            height: 30px;
            cursor: text;
        }

        #cari {
            margin-left: 66%;
            padding: 9.9px 12px;
            cursor: grabbing;
            margin-top: -35.5px;
            display: block;
            background: blue;
            border: none;
            border-radius: 5px;
            color: white;
        }

        #cari:hover {
            background: #333;
            color: white;
        }
    </style>
</head>

<body>
    <div>
        <h1>Data Buku Perpustakaan Online</h1>
        <br>
        <form action="" method="post">
            <input type="text" name="keyword" placeholder="Mencari..." class="read" autofocus autocomplete="off" required>
            <button id="cari" type="submit" name="cari">Cari</button>
        </form>
        <br><br>

        <table border="1" cellpadding="10">
            <tr>
                <th>No</th>
                <th>PERBARUHI</th>
                <th>JENIS BUKU</th>
                <th>JUDUL BUKU</th>
                <th>PENGARANG</th>
                <th>TAHUN TERBIT</th>
                <th>ID BUKU</th>
                <th>HALAMAN</th>
                <th>PENERBIT</th>
                <th>PENULIS</th>
                <th>BUKU</th>
            </tr>

            <?php $i = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $i; ?> </td>
                    <td>
                        <a href="ubah.php?id=<?= $row["id"]; ?> ">EDIT</a> /
                        <a href="hapus.php?id=<?= $row["id"]; ?> " onclick="
                        return confirm('Yakin?');">DELETE</a>
                    </td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jurusan"]; ?></td>
                    <td><?= $row["universitas"]; ?></td>
                    <td><?= $row["idbuku"]; ?></td>
                    <td><?= $row["jumlahalaman"]; ?></td>
                    <td><?= $row["penerbit"]; ?></td>
                    <td><?= $row["penulis"]; ?></td>
                    <td><img src="img/<?php echo $row["gambar"]; ?>" width="70"></td>
                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>
        </table>
        <br><br>
    </div>
    <div>
        <a href="cetak.php" target="_blank">
            <button class="cetak"><i class='bx bxs-printer'></i> Cetak</button>
        </a>
        <br>
        <a href="Tambah.php" target="_blank">
            <button id="btn-2"><i class='bx bx-plus-medical'></i> Tambah Buku</button>
        </a>
    </div>
    <br>
    <br>
    <br>
</body>

</html>