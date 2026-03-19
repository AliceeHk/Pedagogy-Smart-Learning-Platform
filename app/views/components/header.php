<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="/css/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght,XOPQ,XTRA,YOPQ,YTDE,YTFI,YTLC,YTUC@8..144,100..1000,96,468,79,-203,738,514,712&display=swap');

        *::before,
        *::after {
            margin: 0;
            padding: 0;
        }

        html,
        body {
            font-weight: bold;
            font-family: 'Roboto Flex', sans-serif;
            height: 99%;
            top: 0;
        }

        .header {
            width: 100%;
            height: 8%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            padding: 0.5% 0;
            position: fixed;
            left: 0;
            top: 0;
             z-index: 1000;
        }

        .logo-img {
            width: 12%;
            margin: 0.5% 13% 0.5% 4%;
            flex-shrink: 0;
        }

        .search-input {
            flex: 1;
            font-size: 1.2em;
            border: none;
            background-color: #FFF7F2;
            border-radius: 25px;
            color: #9c9c9c;
            font-weight: 600;
            padding: 0 3%;
        }

        .search-form {
            display: flex;
            flex: 1;
            width: 20%;
            height: 74%;
            margin: 0;
            border: none;
        }

        .search-btn {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            flex-shrink: 0;
            margin-left: -6.5%;
            width: 20%;
        }

        .notification-icon {
            width: 2.3%;
            margin-right: 5%;
            margin-left: 8%;
        }

        .search-input:focus {
            outline: none;
            border: none;
        }

        .search-icon {
            width: 18%;
        }
    </style>
</head>

<body class="home-bg">
    <div class="header">
        <img src="/assets/images/logo.png" class="logo-img" alt="Logo">
        <form action="/students/search" method="GET" class="search-form">
            <input class="search-input" type="search" name="search" placeholder="Search...">
            <button type="submit" class="search-btn" aria-label="Search">
                <img src="/assets/images/icon/magnifier.png" class="search-icon" alt="Magnifier">
            </button>
        </form>
        <img src="/assets/images/icon/notification.png" class="notification-icon" alt="Notification">
    </div>
</body>

</html>