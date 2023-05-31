<?php
include 'koneksi.php';
if (isset($_POST['input'])) {
    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $KELAS = $_POST['KELAS'];
    $JURUSAN = $_POST['JURUSAN'];

    $sql = "INSERT INTO data_siswa VALUES ('$NIM', '$NAMA', '$KELAS','$JURUSAN')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    }
}
header("location:studikasus.php")
?>