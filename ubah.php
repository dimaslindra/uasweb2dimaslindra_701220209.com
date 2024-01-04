<?php
require 'functions.php';

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil diubah!');
            document.location.href = 'halaman_admin.php';
            </script>        
        ";
    } else {
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href = 'halaman_admin.php';
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
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background: linear-gradient(0.25turn, rgb(52, 6, 104), black);
            background-size: cover;
            background-position: center;
        }

        .table {
            width: 400px;
            height: 730px;
            margin: auto;
            margin-top: 45px;
            background: white;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: black;
            font-size: 30px;
            padding: 20px;
            margin-bottom: 18px;
            background: #dedede;
            border: 1px dashed red;
        }

        h5 {
            text-align: center;
            font-size: 20px;
            margin-top: -5px;
        }

        b {
            color: black;
            font-size: 20px;
            text-align: center;
            display: flex;
            display: block;
            font-family: 'Times New Roman', Times, serif;
        }

        .wrapper .input-box {
            position: relative;
            width: 200px;
            height: 65px;
            margin: auto;
        }

        .input-box input {
            width: 225px;
            height: 25px;
            margin-left: -12px;
            background: rgb(49, 209, 161);
            border: none;
            outline: none;
            border: 1px solid black;
            border-radius: 7px;
        }

        .btn-warning {
            position: relative;
            padding: 10px 30px;
            width: 150px;
            font-size: 10px;
            line-height: 1;
            border-radius: 5px;
            color: white;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            background-color: blue;
            border: 0;
            overflow: hidden;
            margin: auto;
            display: flex;
            transition: 0, 2s;
        }

        i {
            color: white;
            margin-left: 18px;
        }

        .btn-warning input[type="file"] {
            cursor: pointer;
            position: absolute;
            left: 0;
            top: 0;
            transform: scale(3);
            opacity: 0;
        }

        .btn-warning:hover {
            background: gray;
            box-shadow: 5px 10px 10px solid red 500ms;
            transform: scale(1.03);
        }

        #btn-1 {
            padding: 8px 75px;
            background: yellow;
            border-radius: 5px;
            border: transparent;
            transition: 0, 2s;
            margin: auto;
            display: flex;
            cursor: pointer;
        }

        #btn-1:hover {
            box-shadow: 5px 10px 10px solid red 500ms;
            transform: scale(1.03);
            background: gray;
        }

        .teks1 {
            color: black;
            text-align: center;
            font-size: 17px;
            font-family: Arial, Helvetica, sans-serifs;
        }
    </style>
</head>

<body>
    <div>
        <div class="table">
            <h1>UPDATE DATA</h1>
            <div class="wrapper">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
                    <div class="input-box">
                        <label for="nama"><b>JENIS BUKU</b></label>
                        <input class="teks1" type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
                    </div>
                    <div>
                        <div class="input-box">
                            <label for="email"><b>JUDUL BUKU</b></label>
                            <input class="teks1" type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
                        </div>
                        <div>
                            <div class="input-box">
                                <label for="jurusan"><b>PENGARANG</b></label>
                                <input class="teks1" type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="universitas"><b>TAHUN TERBIT</b></label>
                                    <input class="teks1" type="text" name="universitas" id="universitas" required value="<?= $mhs["universitas"]; ?>">
                                </div>
                                <div class="input-box">
                                    <label for="idbuku"><b>ID BUKU</b></label>
                                    <input class="teks1" type="text" name="idbuku" id="idbuku" required value="<?= $mhs["idbuku"]; ?>">
                                </div>
                                <div class="input-box">
                                    <label for="jumlahalaman"><b>J-HALAMAN</b></label>
                                    <input class="teks1" type="text" name="jumlahalaman" id="jumlahalaman" required value="<?= $mhs["jumlahalaman"]; ?>">
                                </div>
                                <div class="input-box">
                                    <label for="penerbit"><b>PENERBIT</b></label>
                                    <input class="teks1" type="text" name="penerbit" id="penerbit" required value="<?= $mhs["penerbit"]; ?>">
                                </div>
                                <div class="input-box">
                                    <label for="penulis"><b>PENULIS</b></label>
                                    <input class="teks1" type="text" name="penulis" id="penulis" required value="<?= $mhs["penulis"]; ?>">
                                </div>
                                <div>
                                    <div class="btn-warning">
                                        <label for="gambar">
                                        </label>
                                        <input type="file" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
                                        <i class='bx bxs-user'></i> Upload File
                                        </input>
                                    </div>
                                    <br>
                                    <div>
                                        <button id="btn-1" type="submit" name="submit"><b>UPDATE</b></button>
                                    </div>
                </form>
            </div>

</body>

</html>