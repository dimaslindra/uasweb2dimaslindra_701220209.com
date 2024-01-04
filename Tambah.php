<?php
require 'functions.php';

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
            <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'halaman_admin.php';
            </script>        
        ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
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
    <title>Tambah</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background: linear-gradient(0.25turn, rgb(52, 6, 104), black);
            background-size: cover;
            background-position: center;
        }

        .table {
            width: 400px;
            height: 650px;
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
            background: #dedede;
            border: 1px dashed blue;
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
            display: block;
            margin-top: -5px;
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
            margin-left: -14px;
            background: rgb(49, 209, 161);
            border: none;
            outline: none;
            border: 1px solid black;
            border-radius: 5px;
        }

        .btn-warning {
            position: relative;
            padding: 10px 30px;
            width: 150px;
            font-size: 10px;
            line-height: 1.2;
            border-radius: 5px;
            color: white;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
            background-color: red;
            border: 0;
            overflow: hidden;
            margin: auto;
            display: flex;
            transition: .2s;
        }

        i {
            color: white;
            font-size: 25px;
            margin: auto;
        }

        i:hover {
            color: white;
        }

        .btn-warning input {
            cursor: pointer;
            position: absolute;
            left: 0;
            top: 0;
            transform: scale(3);
            opacity: 0;
        }

        .btn-warning:hover {
            background: gray;
            transform: scale(1.03);
        }

        #btn-1 {
            padding: 15px 40px;
            background: blue;
            border-radius: 5px;
            border: transparent;
            transition: 0, 2s;
            margin-left: 37%;
            display: block;
            cursor: pointer;
            transition: .2s;
        }

        #btn-1:hover {
            transform: scale(1.03);
            background: green;
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
            <h1>Insert Book</h1>
            <div class="wrapper">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <label for="nama"><b>Jenis Buku</b></label>
                        <input class="teks1" type="text" name="nama" id="nama" required>
                    </div>
                    <div>
                        <div class="input-box">
                            <label for="email"><b>Judul Buku</b></label>
                            <input class="teks1" type="text" name="email" id="email" required>
                        </div>
                        <div>
                            <div class="input-box">
                                <label for="jurusan"><b>Pengarang</b></label>
                                <input class="teks1" type="text" name="jurusan" id="jurusan" required>
                            </div>
                            <div>
                                <div class="input-box">
                                    <label for="universitas"><b>Tahun Terbit</b></label>
                                    <input class="teks1" type="text" name="universitas" id="universitas" required>
                                </div>
                                <div>
                                    <div class="input-box">
                                        <label for="idbuku"><b>Id Buku</b></label>
                                        <input class="teks1" type="text" name="idbuku" id="idbuku" required>
                                    </div>
                                    <div>
                                        <div class="input-box">
                                            <label for="jumlahalaman"><b>J-Halaman</b></label>
                                            <input class="teks1" type="text" name="jumlahalaman" id="jumlahalaman" required>
                                        </div>
                                        <div>
                                            <div class="input-box">
                                                <label for="penerbit"><b>Penerbit</b></label>
                                                <input class="teks1" type="text" name="penerbit" id="penerbit" required>
                                            </div>
                                            <div>
                                                <div class="input-box">
                                                    <label for="penulis"><b>Penulis</b></label>
                                                    <input class="teks1" type="text" name="penulis" id="penulis" required>
                                                </div>
                                                <div>
                                                    <div class="btn-warning">
                                                        <label for="gambar">
                                                        </label>
                                                        <input type="file" name="gambar" id="gambar" required>
                                                        <i class='bx bxs-book-add'></i> Upload Book
                                                        </input>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <button id="btn-1" type="submit" name="submit"><b><i class='bx bx-folder-plus'></i></b></button>
                                                    </div>
                </form>
            </div>

</body>

</html>