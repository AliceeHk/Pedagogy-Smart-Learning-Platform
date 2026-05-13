<?php
$conn = new mysqli("localhost", "root", "", "pedagogy");

$query = "
SELECT 
    c.id,
    c.nama_channel,
    c.profile_picture,
    u.nama AS guru,
    COALESCE(COUNT(cm.user_id), 0) AS jumlah_anggota
FROM channels c
JOIN users u ON c.user_id = u.id
LEFT JOIN channel_members cm ON c.id = cm.channel_id
GROUP BY c.id, c.nama_channel, c.profile_picture, u.nama
";

$result = $conn->query($query);

$other = $conn->query("
    SELECT 
        c.id,
        c.nama_channel,
        c.profile_picture,
        u.nama AS guru
    FROM channels c
    JOIN users u ON c.user_id = u.id
    LIMIT 4
");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedagogy - Daftar Channel</title>

    <link rel="stylesheet" href="/css/channels-index.css">
</head>

<body>

    <div class="header">
        <?php include_once __DIR__ . '/../components/header.php'; ?>
    </div>

    <div class="sidebar">
        <?php include_once __DIR__ . '/../components/sidebar.php'; ?>
    </div>

    <div class="content">
        <div class="content-wrapper">

            <div class="left">

                <p class="title">
                    Daftar Channels (<?= $result->num_rows ?>)
                </p>

                <?php while ($row = $result->fetch_assoc()): ?>

                    <a href="/channels/detail?id=<?= $row['id'] ?>" class="see-all">

                        <div class="card">

                            <img class="card-img"
                                src="<?= '/' . ltrim($row['profile_picture'], '/') ?>"
                                alt="<?= $row['nama_channel'] ?>">

                            <div class="card-content">

                                <p class="card-title">
                                    <?= $row['nama_channel'] ?>
                                </p>

                                <p class="card-info">

                                    <span>
                                        <img src="/assets/images/icon/channel-teachers.png">
                                        <?= $row['guru'] ?>
                                    </span>

                                    <span>
                                        <img src="/assets/images/icon/channel-members.png">

                                        <?= $row['jumlah_anggota'] >= 100
                                            ? $row['jumlah_anggota'] . '+'
                                            : $row['jumlah_anggota'] ?>
                                    </span>

                                    <span class="card-icons">
                                        <img src="/assets/images/icon/channel-notification.png">
                                        <img src="/assets/images/icon/channel-report.png">
                                    </span>

                                </p>

                                <button>Unfollow</button>

                            </div>

                        </div>

                    </a>

                <?php endwhile; ?>

            </div>

            <div class="right">

                <p class="title">
                    Other Channels
                </p>

                <?php while ($row = $other->fetch_assoc()): ?>

                    <div class="card">

                        <img class="card-img"
                            src="<?= '/' . ltrim($row['profile_picture'], '/') ?>"
                            alt="<?= $row['nama_channel'] ?>">

                        <div class="card-content">

                            <p class="card-title">
                                <?= $row['nama_channel'] ?>
                            </p>

                            <p class="card-info">
                                <?= $row['guru'] ?>
                            </p>

                            <a href="/channels/detail?id=<?= $row['id'] ?>">

                                <button>
                                    See Detail
                                </button>

                            </a>

                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>
    </div>

    <footer class="footer">
        <?php include_once __DIR__ . '/../components/footer.php'; ?>
    </footer>

</body>

</html>