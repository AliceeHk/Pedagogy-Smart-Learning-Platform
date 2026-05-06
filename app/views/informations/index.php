<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy - Daftar Channel</title>
    <link rel="stylesheet" href="/css/channels-index.css">
    <style>
        .scroll-container {
            overflow-x: auto; 
        }

        .scroll-container img {
            width: 255px;
            height: auto;
            flex-shrink: 0;
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
            <div class="scroll-container" style="display: flex; gap: 40px; margin-top: 10px;">
                <img src="assets/images/poster/Information - Family Fun Day.png" alt="">
                <img src="assets/images/poster/Information - Hoco Workshop.png" alt="">
                <img src="assets/images/poster/Information - Moving Forward.png" alt="">
                <img src="assets/images/poster/Information - Open Recuitment Merekat.png" alt="">
                <img src="assets/images/poster/Information - Summer Camp.png" alt="">
            </div>
        </div>
    </div> 
    
    <?php include_once __DIR__ . '/../components/footer.php'; ?>
</body>

</html>