<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="/css/output.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght,XOPQ,XTRA,YOPQ,YTDE,YTFI,YTLC,YTUC@8..144,100..1000,96,468,79,-203,738,514,712&display=swap');

        /* Global resets from create/home */
        *,
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
            background-color: red;
        }

        /* Home page styles */
        body.home-bg {
            display: flex;
            justify-content: center;
        }

        .header {
            margin: -0.56%;
            padding: 0;
            width: 100%;
            height: 11%;
            display: flex;
            align-items: center;
            background-color: #ffffff;
        }

        .logo-img {
            width: 15%;
            margin: 0.5% 11% 0.5% 3.5%;
            flex-shrink: 0;
        }

        input.search-input {
            width: 190%;
            padding: 0.4% 3%;
            font-size: 120%;
            border: none;
            background-color: #FFF7F2;
            border-radius: 25px;
            color: #9c9c9c;
            font-weight: 600;
        }

        form {
            border: none;
            display: flex;
            flex: 1;
            margin: 0;
        }

        input:focus {
            outline: none;
            border: none;
        }
    </style>
</head>

<body class="home-bg">
    <div class="header">
        <img src="/assets/images/logo.png" class="logo-img" alt="Logo">
        <form action="/students/search" method="GET" style="display: flex; flex: 1; margin: 0;">
            <input class="search-input" type="search" name="search" placeholder="Search...">
            <button type="submit" class="search-btn" aria-label="Search">
                <img src="/assets/images/icon/magnifier.png" class="search-icon" alt="Search"
                    style="width: 22%; margin-left: -42%;">
            </button>
        </form>
        <img src="/assets/images/icon/notification.png" class="search-icon" alt="Search"
            style="width: 2.8%; margin-right: 4.5%;">
    </div>
</body>

</html>