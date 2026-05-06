<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/search.css">
</head>

<body class="home-bg">
    <div class="header">
        <img src="/assets/images/logo.png" class="logo-img" alt="Logo">
        <form action="/students/search" method="GET" class="search-form">
            <input class="search-input" type="search" name="search" placeholder="Search..." onfocus="openSearch()">
            <button type="submit" class="search-btn" aria-label="Search">
                <img src="/assets/images/icon/magnifier.png" class="search-icon" alt="Magnifier">
            </button>
        </form>
        <img src="/assets/images/icon/notification.png" class="notification-icon" alt="Notification">
    </div>
    
    <?php include_once __DIR__ . '/search.php'; ?>

