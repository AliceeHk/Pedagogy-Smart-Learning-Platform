<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght,XOPQ,XTRA,YOPQ,YTDE,YTFI,YTLC,YTUC@8..144,100..1000,96,468,79,-203,738,514,712&display=swap');
        {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            border: 1px solid black;
        }

        html,
        body {
            height: 99%;
            font-weight: bold;
            font-family: 'Roboto Flex';
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #FFF7F2;
        }

        .rectangle {
            width: 70%;
            height: 80%;
            display: flex;
            flex-direction: row;
            border-radius: 50px;
            overflow: hidden;
        }

        .rectangle>div:first-child {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #b6b6b6;
        }

        .rectangle>div:last-child {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
            background-color: #C33E3E;
        }

        input {
            width: 80%;
            border-radius: 20px;
            border: none;
            padding: 15px 20px;
            text-align: left;
            margin: 0.5% 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: left;
            width: 80%;
            font-size: 105%;
        }
        
        button {
            width: 90%;
            border-radius: 20px;
            border: none;
            font-size: 105%;
            padding: 15px 20px;
            background-color: #FFF7F2;
            color: #C33E3E;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10%;
        }
    </style>
</head>

<body>
    <div class="rectangle">
        <div>
            <img src="/gambar.png" alt="Gambar">
        </div>
        <div>
            <p style="font-size:300%; font-weight: bold;">Hello Student</p>
            <h1 style="margin-top: -12%; margin-bottom: 10%;">Please Sign Your Account</h1>
            <form action="/students/store" method="POST">
                <input type="text" name="name" placeholder="Name" required><br>
                <input type="password" name="password" placeholder="Password" required><br>
                <button type="submit">Log In</button>
        </div>
    </div>
</body>

</html>