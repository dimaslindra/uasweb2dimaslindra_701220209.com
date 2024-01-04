    <?php
    $conn = mysqli_connect("localhost", "root", "", "multiuser");

    function query($query)
    {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data)
    {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $universitas = htmlspecialchars($data["universitas"]);
        $idbuku = htmlspecialchars($data["idbuku"]);

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $jumlahalaman = htmlspecialchars($data["jumlahalaman"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $penulis = htmlspecialchars($data["penulis"]);

        $query = "INSERT INTO mahasiswa VALUES
        ('',?,?,?,?,?,?,?,?)
    ";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssss", $nama, $email, $jurusan, $universitas, $idbuku, $jumlahalaman, $penerbit, $penulis, $gambar);
        mysqli_stmt_execute($stmt);

        return mysqli_affected_rows($conn);
    }

    function upload()
    {

        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $eror = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        if ($eror === 4) {
            echo "<script>
                    alert('Pilih gambar terlebih dahulu!');
                    </scrip>";
            return false;
        }

        $gambarvalid = ['jpg', 'jpeg', 'png', 'IMG'];
        $gambar = explode('.', $namafile);
        $gambar = strtolower(end($gambar));
        if (!in_array($gambar, $gambarvalid)) {
            echo "<script
                    alert('Mohon Maukkan gambar yang benar!');
                    </script>";
            return false;
        }

        if ($ukuranfile > 30000) {
            echo "<script
            alert('Ukuran gambar terlalu besar!');
            </script>";
            return false;
        }

        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $gambar;


        move_uploaded_file($tmpname, 'img/' . $namafilebaru);

        return $namafilebaru;
    }

    function hapus($id)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data)
    {
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        $universitas = htmlspecialchars($data["universitas"]);
        $idbuku = htmlspecialchars($data["idbuku"]);
        $jumlahalaman = htmlspecialchars($data["jumlahalaman"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $penulis = htmlspecialchars($data["penulis"]);

        $gambar = upload();
        if (!$gambar) {
            return false;
        }

        $query = "UPDATE mahasiswa SET
                    nama = '$nama',
                    email = '$email',
                    jurusan = '$jurusan',
                    universitas = '$universitas',
                    idbuku = '$idbuku',
                    jumlahalaman = '$jumlahalaman',
                    penerbit = '$penerbit',
                    penulis = '$penulis',
                    gambar = '$gambar'
                    WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword)
    {
        $query = "SELECT * FROM mahasiswa
            WHERE
            nama LIKE '&$keyword%'
            ";
        return query($query);
    }


    ?>
