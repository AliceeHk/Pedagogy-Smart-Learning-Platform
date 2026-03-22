<?php
namespace App\Controllers;


class ChannelController {
    public function index() 
    {
        require_once '../app/views/channels/index.php';
    }
    public function detail() 
    {
        require_once '../app/views/channels/deskripsi.php';
    }
}


?>