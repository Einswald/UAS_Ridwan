<?php
require_once('koneksi.php');
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login atau halaman lain yang sesuai
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sono:wght@200;300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css" />
    <title>Mraas Homepage</title>
    <link rel="icon" type="img/png" href="Sumeru.png" sizes="32x32" />
</head>

<body>
    <div class="navbar">
        <nav class="tabel">
            <div class="brand">
                <div class="firstname">Einswald</div>
                <div class="lastname">Page</div>
                <span id="clock" class="clock-center"></span>

            </div>
            <ul class="navigation">
                <li><a href="home.php">Home</a></li>
                <li><a href="CRUD.php">Data Input</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </nav>
        <div class="main">
            <p id="welcome-message"></p>
            <p>how're you doing today?</p>
            <p>Don't forget to input the student data today.</p>
        </div>
    </div>

    <footer class="Copyright">Copyright@Mraas || 223307050</footer>

    <script src="clock.js"></script>
    <script>
        // Ambil elemen dengan ID "welcome-message"
        var welcomeElement = document.getElementById('welcome-message');

        // Ambil data nama user dari session atau sumber data lainnya
        var username = "<?php echo $username; ?>";

        // Tampilkan pesan selamat datang dengan nama user
        welcomeElement.textContent = "Welcome, " + username + "!";

        // Panggil fungsi updateClock dari file clock.js untuk pertama kali
        updateClock(document.getElementById('clock'));
    </script>
</body>

</html>
