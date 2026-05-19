<?php

$conn = new mysqli("localhost", "root", "", "pedagogy");

if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

$id = $_GET['id'] ?? 10;

$user_query = "
SELECT * 
FROM users 
WHERE id = '$id' 
AND role = 'siswa'
";

$user_result = mysqli_query($conn, $user_query);

if (!$user_result || mysqli_num_rows($user_result) == 0) {
    die("Student not found");
}

$user = mysqli_fetch_assoc($user_result);

$channel_query = "
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
WHERE cm.user_id = $id
GROUP BY c.id, c.nama_channel, c.profile_picture, u.nama
";

$channel_result = $conn->query($channel_query);

$achievements = [];

if (!empty($user['achievement'])) {
    $achievements = explode(',', $user['achievement']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedagogy - Profile</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="/css/students-show.css">

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

        <div class="profile-layout">

            <!-- LEFT -->
            <div class="left-section">

                <!-- PROFILE -->
                <div class="profile-header">

                    <div class="profile-image">

                        <img src="<?= $user['profile_picture']; ?>" alt="<?= $user['nama']; ?>">

                    </div>

                    <div class="profile-info">

                        <h2>
                            <?= $user['nama']; ?>
                        </h2>

                        <p>
                            Student <?= $user['kelas']; ?>
                        </p>

                        <p>
                            ID : <?= $user['id']; ?>
                        </p>

                        <div class="achievement-title">
                            Achievement(s)
                        </div>

                        <div class="achievement-list">

                            <?php foreach ($achievements as $achievement): ?>

                                <div class="achievement-item">

                                    <div class="achievement-icon">

                                        <img src="/assets/images/icon/achievements.png" alt="Achievement">

                                    </div>

                                    <?= trim($achievement); ?>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    </div>

                </div>

                <!-- GRID -->
                <div class="bottom-grid">

                    <!-- LEFT GRID -->
                    <div class="bottom-left">

                        <!-- ABOUT -->
                        <div class="card" style="padding: 0px;">

                            <div class="card-title1" style="margin-bottom: -1px;">

                                About Me

                            </div>

                            <div class="about-text" style="padding: 24px;">

                                <?= $user['about_me']; ?>

                            </div>

                        </div>

                        <!-- CONTACT -->
                        <div class="card">

                            <div class="card-title">
                                Contact Information
                            </div>

                            <div class="contact-item">

                                <img src="/assets/images/icon/phone.png">

                                <?= $user['phone']; ?>

                            </div>

                            <div class="contact-item">

                                <img src="/assets/images/icon/location.png">

                                <div>
                                    <?= $user['address']; ?>
                                </div>

                            </div>

                            <div class="contact-item">

                                <img src="/assets/images/icon/instagram.png">

                                <?= $user['email']; ?>

                            </div>

                        </div>

                        <!-- EXPERIENCES -->
                        <div class="card">

                            <div class="card-title">
                                Experiences
                            </div>

                            <div class="experience-item">

                                <b>
                                    <?= $user['experience_title']; ?>
                                </b>

                                - <?= $user['experience_subtitle']; ?>

                                <br>

                                <?= $user['experience_description']; ?>

                            </div>

                        </div>

                    </div>

                    <!-- RIGHT GRID -->
                    <div class="bottom-right">

                        <!-- CHANNELS -->
                        <div class="card" style="padding: 0px;">

                            <div class="card-title1" style="margin-bottom: -1px;">

                                Followed Channels

                            </div>

                            <div class="channel-list" style="padding: 24px;">

                                <?php if ($channel_result->num_rows > 0): ?>

                                    <?php while ($row = $channel_result->fetch_assoc()): ?>

                                        <div class="channel-item">

                                            <img src="<?= $row['profile_picture'] ?>" alt="Channel Picture">

                                            <div class="channel-info">

                                                <h3>
                                                    <?= $row['nama_channel'] ?>
                                                </h3>

                                                <span>

                                                    <?= $row['guru'] ?> |

                                                    <?= $row['jumlah_anggota'] >= 100
                                                        ? $row['jumlah_anggota'] . '+'
                                                        : $row['jumlah_anggota'] ?>

                                                </span>

                                                <p>
                                                    Since 2020
                                                </p>

                                            </div>

                                            <button class="channel-btn">
                                                See Detail
                                            </button>

                                        </div>

                                    <?php endwhile; ?>

                                <?php else: ?>

                                    <p>
                                        No followed channels found.
                                    </p>

                                <?php endif; ?>

                            </div>

                        </div>

                        <!-- FEEDBACK -->
                        <div class="card">

                            <div class="card-title">
                                Teacher's Feedback
                            </div>

                            <div class="feedback-text">

                                <?= $user['teacher_feedback']; ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT SECTION -->
            <div class="right-section">

                <!-- SKILLS -->
                <div class="card">

                    <div class="card-title">
                        Skills
                    </div>

                    <div class="skill">
                        <p>UI Design</p>

                        <div class="progress">
                            <div style="width:90%"></div>
                        </div>
                    </div>

                    <div class="skill">
                        <p>Coding</p>

                        <div class="progress">
                            <div style="width:75%"></div>
                        </div>
                    </div>

                    <div class="skill">
                        <p>Dance</p>

                        <div class="progress">
                            <div style="width:25%"></div>
                        </div>
                    </div>

                    <div class="skill">
                        <p>Cyber Security</p>

                        <div class="progress">
                            <div style="width:95%"></div>
                        </div>
                    </div>

                </div>

                <!-- ACTIVITY -->
                <div class="card">

                    <div class="card-title">
                        Activity
                    </div>

                    <div class="activity-item">
                        <span>Join IT Club</span>
                        <b>2020</b>
                    </div>

                    <div class="activity-item">
                        <span>Web Design Competition</span>
                        <b>Top 5</b>
                    </div>

                    <div class="activity-item">
                        <span>Dance Competition</span>
                        <b>Top 1</b>
                    </div>

                </div>

                <!-- PROJECT -->
                <div class="card">

                    <div class="card-title">
                        Projects
                    </div>

                    <div class="project-grid">

                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">

                            <img src="/assets/images/user/project/pick up a piece every day.png">

                            <img src="/assets/images/user/project/poster.png">

                        </div>

                        <img src="/assets/images/user/project/book's cover.png">

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>