<?php include("header.php");
if (!in_array("guru", $_SESSION['admin_akses'])) {
    echo "kamu tidak memiliki akses";
    include("footer.php");
    exit();
}

require 'functions.php';
if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'admin_siswa.php';
            </script>        
        ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
            document.location.href = 'admin_siswa.php';
            </script>        
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Guru</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dedede;
            display: flex;
            height: 100vh;
        }

        #container {
            text-align: center;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2em;
            text-align: center;
        }

        h2 {
            color: #555;
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        #btn-2 {
            display: inline-block;
            background-color: red;
            color: #fff;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #btn-2:hover {
            background-color: #45a049;
        }

        #btn-2 a {
            color: #fff;
            text-decoration: none;
        }

        #btn-2 i {
            margin-right: 5px;
        }

        #cetak {
            background: #007BFF;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            color: white;
        }

        #cetak:hover {
            background: red;
            color: white;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Selamat Datang di Halaman Guru</h1>
        <h2>Ingin menambahkan buku lainnya?</h2>
        <button id="btn-2"> <a href="Tambah.php" target="_blank">
                <i class='bx bx-plus-medical'></i> Tambah Buku <i class='bx bx-book-bookmark'></i>
            </a> </button>
        <br><br>
        <a href="cetak.php" target="_blank">
            <button id="cetak"><i class='bx bxs-printer'></i> Cetak</button>
        </a>
    </div>
</body>

</html>