<?php
require_once('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Akun</title>
    <link rel="icon" type="img/png" href="Sumeru.png" sizes="32x32" />
    <link rel="stylesheet" href="loginstyle.css">
</head>

<body>
    <div class="container">
        <div class="login">
            <form method="POST">
                <h1>Registrasi Akun</h1>
                <hr>
                <p>Masukkan Username dan Password </p>
                <label>Username</label>
                <input type="text" name="username" placeholder="Masukkan Username">
                <label>Password</label>
                <input type="password" name="password" placeholder="Password setidaknya memiliki 10 karakter">
                <button>Submit</button>
            </form>
            <form method="GET" action="login.php">
                <button class="button">Kembali</button>
            </form>
        </div>
        <div class="pic-login">
            <img src="Loginvid.gif">
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil nilai dari form registrasi
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Cek validitas input
        $errors = array();

        // Cek apakah password memiliki 10 karakter
        if (strlen($password) < 10) {
            $errors[] = "Password harus memiliki setidaknya 10 karakter!";
        }

        // Cek apakah username telah digunakan
        $query = "SELECT * FROM user WHERE username = '$username'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $errors[] = "Username telah digunakan!";
        }

        if (empty($errors)) {
            // Proses registrasi akun
            // ...
    
            // Simpan username dan password ke dalam database
            $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $password);

            // Eksekusi pernyataan yang telah dipersiapkan
            $stmt->execute();

            // Redirect ke halaman login.php
            header("Location: login.php");
            exit();
        }
    }
    ?>
</body>

</html>
