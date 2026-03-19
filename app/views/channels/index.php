<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy - Daftar Channel</title>

    <style>
        * {
            /* border: 1px solid red; */
        }

        :root {
            --sidebar-width: 80px;
            --header-height: 70px;
        }

        body {
            margin: 0;
            background-color: #FFF7F2;
        }

        /* HEADER (FIXED) */
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: var(--header-height);
            background: white;
            z-index: 1000;
        }

        /* SIDEBAR (FIXED) */
        .sidebar {
            position: fixed;
            top: var(--header-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--header-height));
        }

        /* CONTENT */
        .content {
            margin-left: 9%;
            margin-top: 5%;
            margin-right: 1%;
            padding: 20px;
        }

        .content-wrapper {
            display: flex;
            gap: 20px;
        }

        .left {
            width: 65%;
        }

        .right {
            width: 35%;
        }

        /* TITLE */
        .title {
            font-size: 190%;
            color: #D7B483;
            font-weight: 700;
        }

        /* CARD */
        .card {
            width: 100%;
            background: #FFFFFF;
            border-radius: 12px;
            padding: 10px;
            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.06);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .card-img {
            width: 150px;
        }

        .card-img img {
            width: 100%;
            border-radius: 10px;
        }

        .card-content {
            flex: 1;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 22px;
            font-weight: bold;
        }

        .card-icons {
            display: flex;
            gap: 10px;
        }

        .card-icons img {
            width: 24px;
        }

        .card-info {
            color: #C9A66B;
            font-weight: 600;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 5px;
        }

        .card-info img {
            width: 16px;
        }

        .card-button {
            margin-top: 10px;
        }

        .card-button button {
            background: #B3473E;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        /* TABLE CONTENT */
        table.content-table {
            width: 100%;
            border-collapse: collapse;
        }

        table.content-table td {
            padding: 10px;
        }
    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">
    <?php include_once __DIR__ . '/../components/header.php'; ?>
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
</div>

<!-- CONTENT -->
<div class="content">
    <div class="content-wrapper">

        <!-- LEFT -->
        <div class="left">
            <p class="title">Daftar Channels (4)</p>

            <table class="content-table">

                <!-- CARD 1 -->
                <tr>
                    <td>
                        <div class="card">
                            <div class="card-img">
                                <img src="/assets/images/hasil.png">
                            </div>

                            <div class="card-content">
                                <div class="card-header">
                                    <div class="card-title">
                                        Matematika Dasar Aljabar
                                    </div>

                                    <div class="card-icons">
                                        <img src="/assets/images/icon/magnifier.png">
                                        <img src="/assets/images/icon/magnifier.png">
                                    </div>
                                </div>

                                <div class="card-info">
                                    <img src="/assets/images/icon/magnifier.png">
                                    Yulisan |
                                    <img src="/assets/images/icon/magnifier.png">
                                    120+
                                </div>

                                <div class="card-button">
                                    <button>Unfollow</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- CARD 2 -->
                <tr>
                    <td>
                        <div class="card">
                            <div class="card-img">
                                <img src="/assets/images/hasil.png">
                            </div>

                            <div class="card-content">
                                <div class="card-header">
                                    <div class="card-title">
                                        Fisika Dasar
                                    </div>

                                    <div class="card-icons">
                                        <img src="/assets/images/icon/magnifier.png">
                                        <img src="/assets/images/icon/magnifier.png">
                                    </div>
                                </div>

                                <div class="card-info">
                                    <img src="/assets/images/icon/magnifier.png">
                                    Budi |
                                    <img src="/assets/images/icon/magnifier.png">
                                    80+
                                </div>

                                <div class="card-button">
                                    <button>Unfollow</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="card">
                            <div class="card-img">
                                <img src="/assets/images/hasil.png">
                            </div>

                            <div class="card-content">
                                <div class="card-header">
                                    <div class="card-title">
                                        Fisika Dasar
                                    </div>

                                    <div class="card-icons">
                                        <img src="/assets/images/icon/magnifier.png">
                                        <img src="/assets/images/icon/magnifier.png">
                                    </div>
                                </div>

                                <div class="card-info">
                                    <img src="/assets/images/icon/magnifier.png">
                                    Budi |
                                    <img src="/assets/images/icon/magnifier.png">
                                    80+
                                </div>

                                <div class="card-button">
                                    <button>Unfollow</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="card">
                            <div class="card-img">
                                <img src="/assets/images/hasil.png">
                            </div>

                            <div class="card-content">
                                <div class="card-header">
                                    <div class="card-title">
                                        Fisika Dasar
                                    </div>

                                    <div class="card-icons">
                                        <img src="/assets/images/icon/magnifier.png">
                                        <img src="/assets/images/icon/magnifier.png">
                                    </div>
                                </div>

                                <div class="card-info">
                                    <img src="/assets/images/icon/magnifier.png">
                                    Budi |
                                    <img src="/assets/images/icon/magnifier.png">
                                    80+
                                </div>

                                <div class="card-button">
                                    <button>Unfollow</button>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            </table>
        </div>

        <!-- RIGHT -->
        <div class="right">
            <p><b>Info Panel</b></p>
            <p>Total Channels: 4</p>
            <p>Tambahan info di sini</p>
        </div>

    </div>
</div>

</body>
</html>