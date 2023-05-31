<?php
require_once('koneksi.php');

session_start();
if (isset($_SESSION['username'])) {
  header("Location: home.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="img/png" href="Sumeru.png" sizes="32x32" />
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST">
                <h1>Login</h1>
                <hr>
                <p>Silahkan Login Terlebih Dahulu</p>
                <label>Username</label>
                <input type="text" name="username" placeholder="Default: admin">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password">
                <button>Login</button>
                <p>
                    <a href="register.php">Belum punya akun?Silahkan Daftar terlebih dahulu</a>
                </p>
                <closeform></closeform>
            </form>
        </div>
        <div class="pic-login">
            <img src="Loginvid.gif">
        </div>
    </div>

    <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil nilai dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    // Cek username dan password di database
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);
  
    if ($result->num_rows > 0) {
        // Login berhasil, redirect ke halaman home.php
        $_SESSION['username'] = $username; // Set session username
        header("Location: home.php");
        exit();
    } else {
        // Username atau password salah, tampilkan notifikasi
        $errorMessage = "Username atau password salah!";
    }
    
  }
  ?>

</body>
</html>