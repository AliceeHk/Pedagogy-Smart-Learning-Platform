<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="/css/students-create.css">
</head>

<body>
    <div class="login-container">
        <div class="imageAja">
            <img src="/assets/images/login-image.png" alt="Login image">
        </div>

        <div class="form-section">
            <h2>Hello Student!</h2>
            <p>Please Sign Your Account</p>

                <form action="/login" method="POST">
                    <input type="email" name="email" placeholder="Email" required>

                    <input type="password" name="password" placeholder="Password" required>

                    <button type="submit" class="login-btn">LOG IN</button>
                </form>
        </div>
    </div>
</body>

</html>