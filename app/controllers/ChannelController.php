<?php
namespace App\Controllers;

class ChannelController
{
    public function index()
    {
        require_once '../app/views/channels/index.php';
    }

    public function detail()
    {
        $conn = new \mysqli("localhost", "root", "", "pedagogy");

        // cek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // debug
        // var_dump($_GET);

        // ambil id
        $id = $_GET['id'] ?? null;

        if (!$id) {
            die("ID channel tidak ditemukan");
        }

        $query = "
        SELECT 
            c.id,
            c.nama_channel,
            c.profile_picture,
            c.deskripsi,
            u.nama AS guru,
            COALESCE(COUNT(cm.user_id), 0) AS jumlah_anggota
        FROM channels c
        JOIN users u 
            ON c.user_id = u.id
        LEFT JOIN channel_members cm 
            ON c.id = cm.channel_id
        WHERE c.id = ?
        GROUP BY c.id
        ";

        $stmt = $conn->prepare($query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        if (!$row) {
            die("Channel tidak ditemukan");
        }

        require_once '../app/views/channels/deskripsi.php';
    }
}
?>