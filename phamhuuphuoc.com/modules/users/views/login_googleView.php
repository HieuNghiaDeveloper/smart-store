<?php
global $authUrl;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <div class="container">
        <h1>Login với Google</h1>
        <p>Hãy click vào đường link sau để đăng nhập hoặc đăng ký bằng tài khoản Google</p>
        <a href="<?php echo $authUrl ?>" class="login">Google</a>
    </div>
    <style>
        body {
            margin: 2px;
        }

        .container {
            width: 600px;
            margin: 0 auto;
            text-align: center;
            height: auto;
            background: whitesmoke;
            padding: 50px;
            border-radius: 5px;
            box-shadow: 0 1px 6px 0 rgb(32 33 36 / 28%);
        }

        h1 {
            font-weight: bold;
            text-transform: uppercase;
        }

        a {
            display: inline-block;
            background: red;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 2px;
        }
    </style>
</body>

</html>