<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <link rel="stylesheet" href="/css/output.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body class="create-bg">
    <div class="rectangle">
        <div>
            <img src="/assets/images/hasil.png" alt="Gambar">
        </div>
        <div>
            <p class="hello-student">Hello Student</p>
            <h1 class="sign-h1">Please Sign Your Account</h1>
            <form action="/students/store" method="POST">
                <input class="create-input" type="email" name="E-mail" placeholder="E-mail" required><br>
                <input class="create-input" type="password" name="password" placeholder="Password" required><br>
                <button class="create-button" type="submit">Log In</button>
                <button type="submit">Log In</button>
        </div>
    </div>
</body>

</html>