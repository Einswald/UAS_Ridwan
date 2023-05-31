<?php 
if (isset($_POST['edit_siswa'])){
    include("koneksi.php");

    $NIM = $_POST['NIM'];
    $NAMA = $_POST['NAMA'];
    $KELAS = $_POST['KELAS'];
    $JURUSAN = $_POST['JURUSAN'];

    $query = "UPDATE data_siswa SET NAMA = '$NAMA', KELAS = '$KELAS', JURUSAN = '$JURUSAN' WHERE NIM ='$NIM'";
    $result = mysqli_query($conn, $query);

    if (!$result){
        die("Query gagal dijalankan: ".mysqli_errno($conn)." - ".mysqli_error($conn));
    }
}

header("location:tampil_siswa.php");
?>