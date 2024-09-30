<?php

use Illuminate\Support\Facades\Session;

$message = Session::get('message');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset("user/css/login.css")}}">
</head>

<body>
    <div class="wrap">
        <div class="title">ĐĂNG NHẬP </div>
        <?php
        if ($message) {
            echo '<p class="text-arlert">', $message, '</p>';
            Session::put('message', null);
        }
        ?>
        <form action="{{URL::to('/login-customer')}}" autocomplete="off" method="POST" class="form">
            {{csrf_field()}}
            <div class="row row-form">
                <label>Email</label>
                <br>
                <input class="input-form" placeholder="Nhập Email" type="text" name="user_email" required>
            </div>
            <div class=" row row-form">
                <label>Mật khẩu</label>
                <br>
                <input class="input-form" placeholder="Nhập mật khẩu" type="password" name="user_password" required>
            </div>
            <div class="row row-form">
                <input class="submit-btn" type="submit" name="dangnhap" id="" value="Đăng nhập">

                <div class="row-link"><a class="link-submit" href="dangky.php">Đăng ký nếu chưa có tài khoản</a>
                </div>
            </div>

        </form>
    </div>
</body>

</html>