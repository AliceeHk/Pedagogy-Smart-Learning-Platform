<?php
namespace App\Controllers;

class SearchController
{
    public function index(): void
    {
        require_once '../app/views/search/index.php';
    }
}