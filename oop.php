<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "uas_50";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    //data_siswa
    public function tambahData($NIM, $NAMA, $KELAS, $JURUSAN) {
        $stmt = $this->conn->prepare("INSERT INTO data_siswa (NIM, NAMA, KELAS, JURUSAN) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $NIM, $NAMA, $KELAS, $JURUSAN);
        $stmt->execute();
        $stmt->close();
    }
    

    public function tampilData() {
        $sql = "SELECT * FROM data_siswa";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function cariData($keyword) {
        $stmt = $this->conn->prepare("
            SELECT * FROM data_siswa WHERE NAMA LIKE ?
        ");
        $keyword = "%" . $keyword . "%";
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        return $result->num_rows > 0 ? $result : null;
    }    

    public function editData($NIM, $NAMA, $KELAS, $JURUSAN) {
        $stmt = $this->conn->prepare("UPDATE data_siswa SET NIM=?, NAMA=?, KELAS=?, JURUSAN=? WHERE NIM=?");
        $stmt->bind_param("sssss", $NIM, $NAMA, $KELAS, $JURUSAN, $NIM);
        $stmt->execute();
        $stmt->close();
    }    

    public function hapusData($id) {
        $stmt = $this->conn->prepare("DELETE FROM data_siswa WHERE NIM=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function __destruct() {
        $this->conn->close();
    }
}
?>
