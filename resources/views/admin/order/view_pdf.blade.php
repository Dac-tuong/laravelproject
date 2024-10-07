<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    @page {
        margin: 0px;
    }

    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 14px;
        margin: 0;
    }

    .header-page {
        width: 100%;
        background-color: blue;
        display: flex;
        align-items: center;
    }

    .navbar-page {
        margin-left: 30px;
        margin-right: 30px;
    }


    .logo {
        float: left;

        /* background-color: transparent; */
    }

    .info {
        float: right;

        /* background-color: transparent; */
    }

    .logo img {
        height: 70px;
    }
    </style>
</head>

<body>
    <div class="header-page">
        <div class="navbar-page">
            <div class="logo">
                <img src="{{public_path('/admin/images/logo/logo.png')}}">
            </div>
            <div class="info">
                <p>Thành phố Cần Thơ, Quận Tân Bình, Phường Trường Lạc</p>
                <p>Email: dactuong13@gmail.com</p>
                <p>Số điện thoại: 0356459122</p>
            </div>
        </div>
    </div>

</body>

</html>