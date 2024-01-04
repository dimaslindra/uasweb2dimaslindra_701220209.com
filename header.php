<?php
session_start();
include("inc_koneksi.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        #sidebar {
            height: 100%;
            width: 230px;
            position: fixed;
            background-color: #063146;
            padding-top: 25px;
            color: white;
            transition: 0.5s;
            overflow-x: hidden;
        }

        #dashboard {
            color: white;
            display: block;
            font-size: 30px;
        }

        #sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
            border-bottom: 2px solid black;
            border-top: 1px solid rgba(255, 255, 255, .1);
        }

        #sidebar a:hover {
            color: blue;
        }

        #content {
            margin-left: 250px;
            padding: 16px;
            transition: margin-left 0.5s;
        }

        .btn-1,
        .btn-2 {
            display: block;
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            padding: 14px 16px;
            font-size: 18px;
            color: white;
            cursor: pointer;
        }

        .btn-1:hover,
        .btn-2:hover {
            background-color: white;
        }

        #app {
            display: flex;
            flex-direction: column;
        }

        #toggle-btn {
            position: fixed;
            left: 200px;
            top: 10px;
            font-size: 20px;
            color: red;
            cursor: pointer;
            z-index: 1;
        }
    </style>
</head>

<body>

    <div id="toggle-btn">&#9654;</div>

    <div id="sidebar">
        <h1 id="dashboard">Dashboard</h1>
        <a href="halaman_depan.php" class="btn-1">
            <p>Home</p>
        </a>
        <?php if (in_array("guru", $_SESSION['admin_akses'])) { ?>
            <a href="halaman_guru.php" class="btn-1">
                <p>H Guru</p>
            </a>
        <?php } ?>
        <?php if (in_array("siswa", $_SESSION['admin_akses'])) { ?>
            <a href="data_buku.php" class="btn-1">
                <p>Data Buku</p>
            </a>
        <?php } ?>
        <?php if (in_array("spp", $_SESSION['admin_akses'])) { ?>
            <a href="halaman_admin.php" class="btn-1">
                <p>H Admin</p>
            </a>
        <?php } ?>
        <a onclick="javascript: return confirm ('Yakin Ingin Keluar ?');" href="logout.php" class="btn-2">
            <p>Logout</p>
        </a>
    </div>

    <div id="content">
    </div>

    <script>
        document.getElementById('toggle-btn').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var content = document.getElementById('content');

            if (sidebar.style.width === '250px') {
                sidebar.style.width = '0';
                content.style.marginLeft = '0';
                document.getElementById('toggle-btn').innerHTML = '&#9654;';
            } else {
                sidebar.style.width = '250px';
                content.style.marginLeft = '250px';
                document.getElementById('toggle-btn').innerHTML = '&#9664;';
            }
        });
    </script>

</body>

</html>