<?php

require_once "../app/config/database.php";

class Student {

    public function getAll() {
        global $conn;
        return $conn->query("SELECT * FROM users WHERE role='siswa'");
    }

    public function create($nama, $email) {
        global $conn;
        $password = password_hash("123456", PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (nama,email,password,role) VALUES (?,?,?, 'siswa')");
        $stmt->bind_param("sss", $nama, $email, $password);
        $stmt->execute();
    }

    public function find($id) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>