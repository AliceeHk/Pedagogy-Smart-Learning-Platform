<?php

namespace App\Controllers;

class ChannelController
{
    public function index()
    {
        require_once __DIR__ . '/../views/channels/index.php';
    }

    public function detail()
    {
        $conn = new \mysqli("localhost", "root", "", "pedagogy");

        if (!isset($_GET['id'])) {
            die("ID channel tidak ditemukan");
        }

        $id = $_GET['id'];

        $stmt = $conn->prepare("
            SELECT 
                c.*,
                u.nama AS guru,
                COALESCE(COUNT(cm.user_id), 0) AS jumlah_anggota
            FROM channels c
            JOIN users u 
                ON c.user_id = u.id
            LEFT JOIN channel_members cm 
                ON c.id = cm.channel_id
            WHERE c.id = ?
            GROUP BY c.id
        ");

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        if (!$row) {
            die("Channel tidak ditemukan");
        }

        $channels = $conn->query("
            SELECT 
                id,
                nama_channel,
                profile_picture
            FROM channels
            WHERE id != $id
            LIMIT 5
        ");

        require_once __DIR__ . '/../views/channels/detail.php';
    }
}