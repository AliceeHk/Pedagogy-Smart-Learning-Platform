<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy - Daftar Channel</title>
    <link rel="stylesheet" href="/css/channels-index.css">
    <style>
        .scroll-wrapper {
            overflow: hidden;
        }

        .scroll-container {
            display: flex;
            gap: 40px;
            overflow-x: auto;
            scroll-behavior: smooth;
            cursor: grab;
            scrollbar-width: none;
        }

        .scroll-container.active {
            cursor: grabbing;
        }

        .scroll-container::-webkit-scrollbar {
            display: none;
        }

        .scroll-container img {
            height: 400px;
            flex-shrink: 0;
            border-radius: 10px;
            cursor: grab;
            user-drag: none;
            -webkit-user-drag: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <?php include_once __DIR__ . '/../components/header.php'; ?>
    </div>
    <div class="sidebar">
        <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
    </div>
    <div class="content">
        <div>
            <p class="title" style="margin-top:2%; color: #C33E3E;">Competitions</p>
            <div style="display: flex; gap: 40px; margin-top: 10px;">
                <img src="assets/images/poster/Badminton Competition.png" alt="">
                <img src="assets/images/poster/Thesis Competition.png" alt="">
                <img src="assets/images/poster/Singing Competition.png" alt="">
            </div>
            <p class="title" style="margin-top:2%; color: #C33E3E;">Other Informations</p>
            <div class="scroll-wrapper">
                <div class="scroll-container">
                    <img src="assets/images/poster/Information - Family Fun Day.png" alt="">
                    <img src="assets/images/poster/Information - Hoco Workshop.png" alt="">
                    <img src="assets/images/poster/Information - Moving Forward.png" alt="">
                    <img src="assets/images/poster/Information - Open Recuitment Merekat.png" alt="">
                    <img src="assets/images/poster/Information - Summer Camp.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <script>
        const slider = document.querySelector('.scroll-container');

        let isDown = false;
        let startX = 0;
        let scrollLeft = 0;

        slider.addEventListener('mousedown', (e) => {
            isDown = true;
            slider.classList.add('active');
            
            startX = e.pageX;
            scrollLeft = slider.scrollLeft;
        });

        document.addEventListener('mouseup', () => {
            isDown = false;
            slider.classList.remove('active');
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDown) return;

            e.preventDefault();

            const walk = e.pageX - startX;
            slider.scrollLeft = scrollLeft - walk;
        });
    </script>
</body>

</html>