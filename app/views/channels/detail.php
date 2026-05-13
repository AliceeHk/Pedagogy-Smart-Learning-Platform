<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['nama_channel'] ?></title>

    <link rel="stylesheet" href="/css/channels-detail.css">
</head>

<body>

<main class="content">

    <?php include_once __DIR__ . '/../components/header.php'; ?>

    <div class="sidebar">
        <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
    </div>

    <div class="course-card">

        <div class="course-content">

            <div class="course-header-left">

                <a href="/channels" class="back-arrow-inline">
                    <i class="fas fa-arrow-left"></i>
                </a>

                <div class="course-image">

                    <img src="<?= '/' . ltrim($row['profile_picture'], '/') ?>">

                </div>

            </div>

            <div class="course-details">

                <div class="title-row">

                    <h1>
                        <?= $row['nama_channel'] ?>
                    </h1>

                    <div class="action-icons">
                        <i class="fas fa-exclamation-circle"></i>
                        <i class="fas fa-bell"></i>
                    </div>

                </div>

                <p class="instructor">

                    <i class="fas fa-chalkboard-teacher"></i>
                    <?= $row['guru'] ?>

                    |

                    <i class="fas fa-users"></i>

                    <?= $row['jumlah_anggota'] >= 100
                        ? $row['jumlah_anggota'] . '+'
                        : $row['jumlah_anggota'] ?>

                </p>

                <h3 class="intro-heading">
                    Introduction
                </h3>

                <p class="description">
                    <?= $row['deskripsi'] ?>
                </p>

            </div>

        </div>

        <input type="checkbox"
            id="follow-logic"
            class="follow-checkbox">

        <label for="follow-logic" class="btn-toggle">

            <span class="text-unfollow">
                Unfollow
            </span>

            <span class="text-follow">
                Follow
            </span>

        </label>

    </div>

    <div class="stats-grid">

        <div class="card rating-bars">

            <?php
            $rating_data = [
                ['label' => 'five', 'val' => 80, 'count' => 43],
                ['label' => 'four', 'val' => 50, 'count' => 20],
                ['label' => 'Three', 'val' => 35, 'count' => 7],
                ['label' => 'two', 'val' => 25, 'count' => 2],
                ['label' => 'one', 'val' => 10, 'count' => 4],
            ];

            foreach (array_reverse($rating_data) as $r):
            ?>

                <div class="bar-item">

                    <span class="label-star">
                        <?= $r['label'] ?>
                        <i class="fas fa-star"></i>
                    </span>

                    <div class="progress-bg">

                        <div class="progress-fill"
                            style="width: <?= $r['val'] ?>%;">
                        </div>

                    </div>

                    <span class="count">
                        <?= $r['count'] ?>
                    </span>

                </div>

            <?php endforeach; ?>

        </div>

        <div class="card rating-summary">

            <span class="big-num">
                4.3
            </span>

            <div class="stars-gold">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>

            <p>76 Ratings</p>

        </div>

        <div class="card give-rating">

            <p>Can You Give Rating?</p>

            <div class="rating-wrapper">

                <input type="radio" name="rating" id="star-5" value="5">
                <label for="star-5" class="fas fa-star"></label>

                <input type="radio" name="rating" id="star-4" value="4">
                <label for="star-4" class="fas fa-star"></label>

                <input type="radio" name="rating" id="star-3" value="3">
                <label for="star-3" class="fas fa-star"></label>

                <input type="radio" name="rating" id="star-2" value="2">
                <label for="star-2" class="fas fa-star"></label>

                <input type="radio" name="rating" id="star-1" value="1">
                <label for="star-1" class="fas fa-star"></label>

            </div>

        </div>

    </div>

    <h3 class="section-title">
        Channels You May Like
    </h3>

    <div class="channel-list">

        <?php while ($ch = $channels->fetch_assoc()): ?>

            <a href="/channels/detail?id=<?= $ch['id'] ?>"
                class="channel-card">

                <img src="<?= '/' . ltrim($ch['profile_picture'], '/') ?>">

                <p>
                    <?= $ch['nama_channel'] ?>
                </p>

            </a>

        <?php endwhile; ?>

    </div>

</main>

</body>

</html>