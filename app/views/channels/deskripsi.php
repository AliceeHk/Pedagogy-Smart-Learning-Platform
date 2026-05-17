<?php
$conn = new mysqli("localhost", "root", "", "pedagogy");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'] ?? 1;

$query = "
SELECT 
    c.*,
    u.nama AS guru,
    COALESCE(COUNT(cm.user_id), 0) AS jumlah_anggota
FROM channels c
JOIN users u 
    ON c.user_id = u.id
LEFT JOIN channel_members cm 
    ON c.id = cm.channel_id
WHERE c.id = ?
GROUP BY c.id
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();

$guruId = $row['user_id'];

$recommendedChannels = [];

$sameGuruQuery = "
SELECT 
    c.*,
    u.nama AS guru
FROM channels c
JOIN users u
    ON c.user_id = u.id
WHERE c.user_id = ?
AND c.id != ?
LIMIT 5
";

$sameGuruStmt = $conn->prepare($sameGuruQuery);
$sameGuruStmt->bind_param("ii", $guruId, $id);
$sameGuruStmt->execute();

$sameGuruResult = $sameGuruStmt->get_result();

while ($ch = $sameGuruResult->fetch_assoc()) {
    $recommendedChannels[] = $ch;
}

$currentCount = count($recommendedChannels);

if ($currentCount < 5) {

    $excludeIds = [$id];

    foreach ($recommendedChannels as $item) {
        $excludeIds[] = $item['id'];
    }

    $excludeString = implode(',', $excludeIds);

    $remaining = 5 - $currentCount;

    $randomQuery = "
    SELECT 
        c.*,
        u.nama AS guru
    FROM channels c
    JOIN users u
        ON c.user_id = u.id
    WHERE c.id NOT IN ($excludeString)
    ORDER BY RAND()
    LIMIT $remaining
    ";

    $randomResult = $conn->query($randomQuery);

    while ($ch = $randomResult->fetch_assoc()) {
        $recommendedChannels[] = $ch;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $row['nama_channel'] ?></title>

    <link rel="stylesheet" href="/css/channels-detail.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>

    <div class="header">
        <?php include_once __DIR__ . '/../components/header.php'; ?>
    </div>

    <div class="main-layout">

        <div class="sidebar">
            <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
        </div>

        <main class="content">

            <div class="course-card">

                <div class="course-content">

                    <div class="course-header-left">

                        <div class="back-arrow-inline">
                            <a href="/channels">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                        </div>

                        <div class="course-image">
                            <img src="<?= $row['profile_picture'] ?>">
                        </div>

                    </div>

                    <div class="course-details">

<div class="title-row">

    <h1><?= $row['nama_channel'] ?></h1>

    <div class="action-icons">
        <i class="fas fa-exclamation-circle"></i>
        <i class="fas fa-bell"></i>
    </div>

    <input type="checkbox" id="follow-logic" class="follow-checkbox">

    <label for="follow-logic" class="btn-toggle">

        <span class="text-unfollow">
            Unfollow
        </span>

        <span class="text-follow">
            Follow
        </span>

    </label>

</div>

                        <p class="instructor">

                            <i class="fas fa-chalkboard-teacher"></i>
                            <?= $row['guru'] ?> |

                            <i class="fas fa-users"></i>

                            <?= $row['jumlah_anggota'] >= 100
                                ? $row['jumlah_anggota'] . '+'
                                : $row['jumlah_anggota'] ?>

                        </p>

                        <h3 class="intro-heading">Introduction</h3>

                        <p class="description">
                            <?= $row['deskripsi'] ?>
                        </p>

                    </div>

                </div>

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
                                <div class="progress-fill" style="width: <?= $r['val'] ?>%;">
                                </div>
                            </div>

                            <span class="count">
                                <?= $r['count'] ?>
                            </span>

                        </div>

                    <?php endforeach; ?>

                </div>

                <div class="card rating-summary">

                    <span class="big-num">4.3</span>

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

                <?php foreach ($recommendedChannels as $ch): ?>

                    <div class="channel-card">

                        <img src="<?= $ch['profile_picture'] ?>" alt="Channel">

                        <p>
                            <?= $ch['nama_channel'] ?> by <?= $ch['guru'] ?>
                        </p>

                    </div>

                <?php endforeach; ?>

            </div>

        </main>

    </div>

</body>

</html>