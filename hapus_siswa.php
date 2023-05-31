<?php
include 'koneksi.php';
if (isset($_GET['NIM'])) {
    $id = $_GET['NIM'];

    $sql = "DELETE FROM data_siswa WHERE NIM='$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
}
header("location:CRUD.php");
?>