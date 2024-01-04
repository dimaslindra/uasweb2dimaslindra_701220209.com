<?php include("header.php");
if (!in_array("siswa", $_SESSION['admin_akses'])) {
    echo "kamu tidak memiliki akses";
    include("footer.php");
    exit();
}
?>
<?php include("footer.php");
require 'functions.php';
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #dedede;
            font-family: 'Arial', sans-serif;
        }

        h1 {
            text-align: center;
            color: green;
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
            width: 80%;
        }

        #btn-2 {
            padding: 10px 25px;
            background: white;
            border: transparent;
            border-radius: 10px;
            margin: auto;
            display: flex;
            margin-top: 30px;
            box-shadow: 0 0 10px rgba(1, 1, 1, 0.8);
        }

        #btn-2:hover {
            background: #333;
            transform: scale(1.03);
        }

        a {
            color: red;
            font-size: 20px;
            text-decoration: none;
            text-align: center;
            margin: auto;
        }
    </style>
</head>

<body>
    <diiv>
        <h1>DATA PERPUSTAKAAN ONLINE</h1>
        <table border="1" cellpadding="10" cellspacing="2" style="background: white; box-shadow: 0 0 10px rgba(1, 1, 1, 0.8); ">

            <tr>
                <th>NO</th>
                <th>JENIS BUKU</th>
                <th>JUDUL BUKU</th>
                <th>PENGARANG</th>
                <th>TAHUN TERBIT</th>
                <th>ID BUKU</th>
                <th>HALAMAN</th>
                <th>PENERBIT</th>
                <th>PENULIS</th>
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
                    <td><?= $row["idbuku"]; ?></td>
                    <td><?= $row["jumlahalaman"]; ?></td>
                    <td><?= $row["penerbit"]; ?></td>
                    <td><?= $row["penulis"]; ?></td>
                    <td><img src="img/<?php echo $row["gambar"]; ?>" width="70"></td>
                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>

        </table>
        <br> <br>

        </div>
</body>

</html>