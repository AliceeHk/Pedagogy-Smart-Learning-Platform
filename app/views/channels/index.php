<?php
$conn = new mysqli("localhost", "root", "", "pedagogy");

$user_id = 10;

$query = "
SELECT 
    c.id,
    c.nama_channel,
    c.profile_picture,
    u.nama AS guru,
    COUNT(cm2.user_id) AS jumlah_anggota
FROM channel_members cm
JOIN channels c ON cm.channel_id = c.id
JOIN users u ON c.user_id = u.id
LEFT JOIN channel_members cm2 ON c.id = cm2.channel_id
WHERE cm.user_id = $user_id
GROUP BY c.id, c.nama_channel, c.profile_picture, u.nama
";

$result = $conn->query($query);
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

                        <table class="content-table">
                            <tr>
                                <td>

                                    <div class="card">

                                        <div class="card-img">
                                            <img src="<?= '/' . ltrim($row['profile_picture'], '/') ?>" alt="">
                                        </div>

                                        <div class="card-content">

                                            <div class="card-header">

                                                <div class="card-title">
                                                    <?= $row['nama_channel'] ?>
                                                </div>

                                                <div class="card-icons">
                                                    <img src="/assets/images/icon/channel-notification.png">
                                                    <img src="/assets/images/icon/channel-report.png">
                                                </div>

                                            </div>

                                            <div class="card-info">

                                                <img src="/assets/images/icon/channel-teachers.png">
                                                <?= $row['guru'] ?> |

                                                <img src="/assets/images/icon/channel-members.png">

                                                <?= $row['jumlah_anggota'] >= 100
                                                    ? $row['jumlah_anggota'] . '+'
                                                    : $row['jumlah_anggota'] ?>

                                            </div>

                                            <div class="card-button">
                                                <button>Unfollow</button>
                                            </div>

                                        </div>

                                    </div>

                                </td>
                            </tr>
                        </table>

                    </a>

                <?php endwhile; ?>
            </div>

            <div class="right">
                <p class="title" style="margin-bottom: 6.4%;">Other Channels</p>

                <?php
                $other = $conn->query("
                SELECT 
                c.id,
                c.nama_channel,
                c.profile_picture,
                u.nama AS guru
                FROM channels c
                JOIN users u ON c.user_id = u.id
                WHERE c.id NOT IN (
                SELECT channel_id
                FROM channel_members
                WHERE user_id = $user_id
                )
                LIMIT 4
                ");
                ?>

                <?php while ($row = $other->fetch_assoc()): ?>
                    <table>
                        <tr>
                            <td>
                                <div class="card">
                                    <div class="card-img">
                                        <img src="<?= $row['profile_picture'] ?>">
                                    </div>
                                    <div class="card-content">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <?= $row['nama_channel'] ?>
                                            </div>
                                        </div>
                                        <div class="card-info">
                                            <?= $row['guru'] ?>
                                        </div>
                                        <div class="card-button">
                                            <a href="/channels/detail.php?id=<?= $row['id'] ?>">
                                                <button>See Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                <?php endwhile; ?>

                <p class="title" style="margin-bottom: 6.4%; margin-left: 90px; color: #C33E3E;">See More</p>
                <hr style="border: 1.25px solid #C33E3E; width: 230px; margin-left: 35px; margin-bottom: 25px;">
                <img style="height: 180px; width: 239px; margin-left: 25px;" src="/assets/images/icon/branding.png" alt="">
            </div>

        </div>
    </div>

    <footer class="footer">
        <?php include_once __DIR__ . '/../components/footer.php'; ?>
    </footer>
    <?php include_once __DIR__ . '/../components/footer.php'; ?>
</body>

</html>