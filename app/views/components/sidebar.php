<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy - Daftar Channel</title>
    <style>
        #sidebar {
            height: 92.19vh;
            border-collapse: separate;
            border-spacing: 0;
            background-color: #C33E3E;
            width: 7%;
            position: fixed;
            left: 0;
            top: 60px;
             z-index: 1000;
        }

        tr img {
            width: 50%;
            justify-self: center;
        }

        .gap td {
            height: 20%;
            border: none;
            position: relative;
        }

        .gap td::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 3px;
            background-color: #FFF7F2;
        }
    </style>
</head>

<body>
    <?php
    include_once __DIR__ . '/../components/header.php';
    ?>
    <div class="sidebar">
        <table id="sidebar">
            <tr>
                <td><a href="/channels"><img src="/assets/images/icon/home.png" alt="home"></a></td>
            </tr>
            <tr>
                <td><a href="/channels"><img src="/assets/images/icon/task.png" alt="task"></a></td>
            </tr>
            <tr>
                <td><a href="/channels"><img src="/assets/images/icon/information.png" alt="information"></a></td>
            </tr>
            <tr>
                <td><a href="/channels"><img src="/assets/images/icon/profile.png" alt="profile"></a></td>
            </tr>
            <tr class="gap">
                <td></td>
            </tr>
            <tr>
                <td><a href="/channels"><img src="/assets/images/icon/logout.png" alt="logout"></a></td>
            </tr>
        </table>
    </div>
</body>

</html>