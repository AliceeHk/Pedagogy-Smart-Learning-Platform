<?php
$conn = new mysqli("localhost", "root", "", "pedagogy");

$user_id = 10;

$queryNotif = "
SELECT notifications
FROM users
WHERE id = $user_id
";

$resultNotif = $conn->query($queryNotif);
$notif = $resultNotif->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy</title>

    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/logout.css">
    <link rel="stylesheet" href="/css/search.css">

    <style>
        .notification-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.45);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .notification-popup {
            width: 450px;
            min-height: 250px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            animation: popupFade 0.2s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 24px;
        }

        .notification-title {
            font-size: 38px;
            font-weight: 800;
            color: #C33E3E;
            margin-bottom: 6px;
        }

        .notification-image img {
            width: 110px;
            margin: 6px 0;
        }

        .notification-empty {
            font-size: 22px;
            font-weight: 700;
            color: #C33E3E;
            margin-bottom: 6px;
        }

        .notification-subtext {
            font-size: 15px;
            color: #C33E3E;
            max-width: 300px;
            line-height: 1.4;
        }

        .notification-icon {
            cursor: pointer;
        }

        @keyframes popupFade {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="home-bg">

    <div class="header">
        <img src="/assets/images/logo.png" class="logo-img" alt="Logo">

        <!-- <form action="/students/search" method="GET" class="search-form" onsubmit="return false;">
            <input class="search-input" type="search" name="search" placeholder="Search..."
                onfocus="window.location.href='/search';">

            <button type="button" class="search-btn" aria-label="Search" onclick="window.location.href='/search';">
                <img src="/assets/images/icon/magnifier.png" class="search-icon" alt="Magnifier">
            </button>
        </form> -->

        <img src="/assets/images/icon/notification.png" class="notification-icon" alt="Notification"
            onclick="toggleNotification()">
    </div>

    <div id="notification-overlay" class="notification-overlay">
        <div id="notification-popup" class="notification-popup">
            <?php if ($notif['notifications'] == 'none' || empty($notif['notifications'])): ?>
                <div class="notification-title">Notification</div>
                <div class="notification-image">
                    <img src="/assets/images/icon/empty-inbox.png" alt="">
                </div>
                <div class="notification-empty">Your Inbox is Empty</div>
                <div class="notification-subtext">All incoming requests will be listed in this folder</div>
            <?php else: ?>
                <div class="notification-title">Notification</div>
                <div
                    style="margin-top:16px; padding:16px; font-size:16px; color:#C63D3D; font-weight:600; text-align:center;">
                    <?= htmlspecialchars($notif['notifications']) ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div id="logout-overlay" class="modal-overlay">
        <div class="modal-box">
            <h2>Apakah Kamu Yakin Untuk Logout?</h2>
            <div class="modal-buttons">
                <button id="close-logout-btn" class="btn-cancel">Batal</button>
                <a href="/logout" style="text-decoration: none;">
                    <button class="btn-logout">Ya, Keluar</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        function toggleNotification() {
            const overlay = document.getElementById("notification-overlay");
            if (overlay) {
                overlay.style.display = "flex";
            }
        }

        document.addEventListener("DOMContentLoaded", function () {
            const logoutOverlay = document.getElementById("logout-overlay");
            const closeLogoutBtn = document.getElementById("close-logout-btn");

            // Menangani klik tombol logout dari sidebar
            document.addEventListener("click", function (e) {
                const logoutTrigger = e.target.closest("#sidebar-logout-btn");
                if (logoutTrigger) {
                    e.preventDefault();
                    if (logoutOverlay) {
                        logoutOverlay.classList.add("show");
                    }
                }
            });

            // Menutup modal via tombol Batal
            if (closeLogoutBtn) {
                closeLogoutBtn.addEventListener("click", function () {
                    if (logoutOverlay) {
                        logoutOverlay.classList.remove("show");
                    }
                });
            }

            // Menutup modal jika area overlay luar diklik
            window.addEventListener("click", function (e) {
                const notifOverlay = document.getElementById("notification-overlay");
                const notifPopup = document.getElementById("notification-popup");
                const notifIcon = document.querySelector(".notification-icon");

                if (notifOverlay && notifOverlay.style.display === "flex") {
                    if (!notifPopup.contains(e.target) && e.target !== notifIcon) {
                        notifOverlay.style.display = "none";
                    }
                }

                if (e.target === logoutOverlay) {
                    logoutOverlay.classList.remove("show");
                }
            });
        });
    </script>