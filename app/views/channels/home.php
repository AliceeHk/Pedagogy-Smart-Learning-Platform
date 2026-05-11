<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy Dashboard</title>
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>

    <?php include_once __DIR__ . '/../components/header.php'; ?>

    <div class="container">
        <aside class="sidebar">
            <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
        </aside>

        <main class="main-content">
            <section class="top-section">
                <div class="profile-info">
                    <div class="avatar">
                        <img src="path/ke/avatar.jpg" alt="Avatar">
                    </div>
                    <div class="user-details">
                        <h1 class="greeting">Hello Britania!</h1>
                        <h2 class="full-name">Britania Fisichella</h2>
                        <p class="class-info">Student XI TKJ 1</p>
                        <p class="student-id">123456789</p>
                    </div>
                </div>

                <div class="progress-container-main">
                    <div class="progress-header-inline">
                        <h3>Your Progress</h3>
                        <a href="#" class="see-detail">See Detail</a>
                    </div>
                    <div class="progress-cards-flex">
                        <?php 
                        $items = [['MTK dasar', 80], ['English Discovery', 40], ['Preparing For TOEFL', 50]];
                        for ($i = 0; $i < 2; $i++): ?>
                        <div class="mini-card">
                            <?php foreach($items as $item): ?>
                            <div class="bar-row">
                                <span class="subject"><?= $item[0] ?></span>
                                <div class="bar-bg"><div class="bar-fill" style="width: <?= $item[1] ?>%;"></div></div>
                                <span class="percentage"><?= $item[1] ?>%</span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </section>

            <hr class="divider">

            <section class="content-section">
                <h2 class="section-title">Today Motivations</h2>
                <div class="grid-container-motive">
                    <div class="card-img"><img src="motive1.jpg" alt="Motive 1"></div>
                    <div class="card-img"><img src="motive2.jpg" alt="Motive 2"></div>
                    <div class="card-img"><img src="motive3.jpg" alt="Motive 3"></div>
                    <div class="card-img"><img src="motive4.jpg" alt="Motive 4"></div>
                </div>
            </section>

            <section class="content-section">
                <h2 class="section-title">Channels Recommendation</h2>
                <div class="grid-container-channels">
                    <div class="channel-card">
                        <img src="channel1.jpg" alt="Fisika">
                        <p>Fisika by Hadinan</p>
                    </div>
                    </div>
            </section>
        </main>
    </div>
</body>
</html>