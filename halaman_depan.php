<?php
include("header.php");
?>
<?php
include("footer.php");
require 'functions.php';

if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' OR email LIKE '%$search%' OR jurusan LIKE '%$search%'";
    $result = mysqli_query($conn, $query);
} else {
    $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background: #dedede;
            color: white;
            font-family: Arial, Helvetica, sans-serif;
        }

        html {
            font-size: 62%;
        }

        h1 {
            text-align: center;
        }

        main {
            max-width: 1500px;
            width: 95%;
            margin: 30px auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: auto;
        }

        main .card {
            max-width: 300px;
            flex: 1 1 210px;
            height: 400px;
            border: 3px solid gray;
            border-radius: 8px;
            background: #333;
            margin: 20px;
            font-weight: bold;
        }

        main .card .image {
            height: 50%;
            margin-bottom: 20px;
        }

        main .card .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        main .card .caption {
            padding-left: 1em;
            line-height: 3em;
            height: 25%;
        }

        main .card .caption p {
            font-size: 1.5rem;
        }

        #btn-1 {
            background: red;
            padding: 10px 15px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: white;
            transition: all;
        }

        #btn-1:hover {
            background: #dedede;
            color: red;
            transform: scale(1.09);
            transition: .2s;
        }

        .read {
            margin: auto;
            display: block;
            display: flex;
            width: 30%;
            height: 30px;
            cursor: text;
        }

        #btn-2 {
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

        #btn-2:hover {
            background: #333;
            color: white;
        }
    </style>
</head>

<body>
    <h1></h1>
    <div>
        <form action="" method="get">
            <input type="text" name="search" placeholder="Cari Buku..." class="read" autofocus autocomplete="off" required>
            <button id="btn-2" type="submit">Cari</button>
        </form>
    </div>
    <br><br>
    <br>
    <main>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="card">
                <div class="image">
                    <img src="img/<?php echo $row["gambar"]; ?>" alt="">
                </div>
                <div class="caption">
                    <p class="product_name">JENIS : <?= $row["nama"]; ?></p>
                    <p class="price">JUDUL : <?= $row["email"]; ?></p>
                    <p class="price">PENERBIT : <?= $row["jurusan"]; ?></p>
                    <button id="btn-1">Baca Buku</button>
                </div>
            </div>
        <?php endwhile; ?>
    </main>

</body>

</html>