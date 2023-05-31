<?php
include 'oop.php';

$db = new Database();
$resultMahasiswa = $db->tampilData();


if (isset($_POST['NIM'])) {
    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $KELAS = $_POST['KELAS'];
    $JURUSAN = $_POST['JURUSAN'];

    $db->tambahData($NIM, $NAMA, $KELAS, $JURUSAN);
}
?>

<!DOCTYPE html>
<html>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@200;300&display=swap" rel="stylesheet">
    <title>DATA SISWA</title>
    <link rel="icon" type="img/png" href="Sumeru.png" sizes="32x32" />
    <style>
        /* CSS untuk desain tampilan */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            /* Atur tinggi navbar sesuai kebutuhan */
            background-color: black;
            box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0);
        }

        .tabel {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 20px;
            padding: 0px;
            width: 100%;
            height: 100%;
            /* Ubah tinggi menjadi 100% */
            background-color: black;
            box-shadow: 0 7px 15px 0 rgba(0, 0, 0, 0);
        }

        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff6a00, #0978e7);
        }

        .brand {
            display: flex;
            flex-direction: row;
            font-size: 1.5em;
            padding: 15px;
            text-transform: capitalize;
        }

        .firstname {
            color: white;
            font-weight: 700;
        }

        .lastname {
            color: aqua;
            padding-left: 4px;
        }

        .navigation {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .navigation>li {
            list-style-type: none;
            padding: 15px;
        }

        .navigation>li>a {
            color: white;
            font-size: 20px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .navigation>li>a:hover {
            color: aqua;
            transition: all .4s ease-in-out;
        }

        .navigation>li>img {
            width: 50px;
            height: 50px;
            border-radius: 50px;
        }

        .main {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: rgb(0, 0, 0);
            font-size: 20px;
            font-weight: bold;
        }

        h1 {
            text-align: center;
        }

        table {
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
        }

        form {
            margin: 20px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #40E0D0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .search-box {
            margin-bottom: 20px;
        }

        .search-box input[type="text"] {
            width: 50%;
            padding: 5px;
            margin-right: 10px;
        }

        .Copyright {
            color: whitesmoke;
            padding: 20px;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <nav class="tabel">
            <div class="brand">
                <div class="firstname">Einswald</div>
                <div class="lastname">Page</div>
            </div>
            <ul class="navigation">
                <li><a href="home.php">Home</a></li>
                <li><a href="CRUD.php">Data Input</a></li>
            </ul>
        </nav>

    </div>
    <footer class="Copyright">Copyright@Mraas || 223307050</footer>
    <h1>MASUKKAN DATA SISWA</h1>
    <form method="POST">
        <input type="text" name="NIM" placeholder="NIM"><br>
        <input type="text" name="NAMA" placeholder="Nama Siswa"><br>
        <input type="text" name="KELAS" placeholder="KELAS"><br>
        <input type="text" name="JURUSAN" placeholder="JURUSAN"><br>
        <input type="submit" name="input" value="Tambah Data">
    </form>
    <br><br>

    <div class="search-box">
        <form method="POST">
            <input type="text" name="keyword" placeholder="Cari Data">
            <input type="submit" name="cari" value="Cari">
        </form>
    </div>

    <h1>Data Siswa</h1>
    <table>
        <tr>
            <th>NIM</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($resultMahasiswa as $row): ?>
            <tr>
                <td>
                    <?= $row['NIM']; ?>
                </td>
                <td>
                    <?= $row['NAMA']; ?>
                </td>
                <td>
                    <?= $row['KELAS']; ?>
                </td>
                <td>
                    <?= $row['JURUSAN']; ?>
                </td>
                <td>
                    <a href="edit_siswa.php?NIM=<?= $row['NIM']; ?>">Edit</a>
                    <a href="hapus_siswa.php?NIM=<?= $row['NIM']; ?>"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data Siswa?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>