<?php
include 'oop.php';

$db = new Database();

if (isset($_POST['update'])) {
    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $KELAS = $_POST['KELAS'];
    $JURUSAN = $_POST['JURUSAN'];

    $db->editData($NIM, $NAMA, $KELAS,$JURUSAN);

    // Redirect to studikasus.php after updating data
    header("Location: CRUD.php");
    exit();
}

if (isset($_GET['NIM'])) {
    $NIM = $_GET['NIM'];

    // Fetch the data for the selected NIM
    $stmt = $db->conn->prepare("SELECT * FROM data_siswa WHERE NIM = ?");
    $stmt->bind_param("s", $NIM);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Check if the data exists
    if (!$row) {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Siswa</title>
    <style>
        /* CSS untuk desain tampilan */
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff6a00, #0978e7);
        }
        
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #FF7F00;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h1>Edit Siswa</h1>
    <form method="POST">
        <input type="hidden" name="NIM" value="<?= $row['NIM']; ?>">
        <input type="text" name="NAMA" value="<?= $row['NAMA']; ?>" placeholder="Nama Siswa" required><br>
        <input type="text" name="KELAS" value="<?= $row['KELAS']; ?>" placeholder="Kelas" required><br>
        <input type="text" name="JURUSAN" value="<?= $row['JURUSAN']; ?>" placeholder="Jurusan" required><br>
        <input type="submit" name="update" value="Update Data">
    </form>
</body>

</html>
