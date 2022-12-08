<?php

@include 'koneksi.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="css/update.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</head>

<body>

    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img src="./img/vmware.svg" alt="">
            </div>

            <span class="logo_name">Titu Laundry</span>
        </div>
        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="index.php">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="product.php">
                        <i class="uil uil-box"></i>
                        <span class="link-name">Product</span>
                    </a></li>
                <li><a href="voucher/voucher.php">
                        <i class="uil uil-pricetag-alt"></i>
                        <span class="link-name">Voucher</span>
                    </a></li>
                <li><a href="adsbanner/adsbanner.php">
                        <i class="uil uil-layer-group"></i>
                        <span class="link-name">Ads banner</span>
                    </a></li>
                <li><a href="order.php">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="link-name">Order</span>
                    </a></li>
                <li><a href="performance.php">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a>
                </li>
                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <img src="./img/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
            <a href="addproduct.php">
                    <button href="addproduct.php" type="button" class="btnsimpan" data-toggle="modal" data-target="#exampleModal">Simpan</button>
                </a>

                <div class="title">
                    <span class="text">Detail pesanan nomor #583</span>
                    <span class="subtext">Pembayaran melalui transfer Bank BRI</span>
                </div>

                
                <div class="dropdown">
                    <div class="select-btn">
                        <span>Status</span>
                        <i class="uil uil-angle-down"></i>
                    </div>
                    <div class="content">
                        <div class="search">
                            <i class="uil uil-search"></i>
                            <input type="text" placeholder="Search">
                        </div>
                        <ul class="options"></ul>
                    </div>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-plane-arrival"></i>
                        <span class="text">Waktu penjemputan</span>
                        <span class="number">08:00 - 8 Desember 2022</span>
                        <span class="text2">Alamat penjemputan</span>
                        <span class="number">Ahmad Fikril Al Muzakki</span>
                        <span class="number">Jln. Suparjan Mangun Wijaya, Ds. Bujel, Kec. Mojororoto, RT 02 RW 03, Gang 3</span>
                        <span class="number">085156023639</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-plane-departure"></i>
                        <span class="text">Waktu pengiriman</span>
                        <span class="number">13:00 - 12 Desember 2022</span>
                        <span class="text2">Alamat penjemputan</span>
                        <span class="number">Ahmad Fikril Al Muzakki</span>
                        <span class="number">Jln. Suparjan Mangun Wijaya, Ds. Bujel, Kec. Mojororoto, RT 02 RW 03, Gang 3</span>
                        <span class="number">085156023639</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="activity-data">
                    <div class="data date">
                        <span class="data-title">Pesanan</span>
                        <span class="data-list">Cuci kering</span>
                    </div>
                    <div class="data desc">
                        <span class="data-title">Harga</span>
                        <span class="data-list">4000</span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Berat cucian</span>
                        <span class="data-list">3 KG</span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Total</span>
                        <span class="data-list">12000</span>
                    </div>
                </div>

                <div class="rincian">
                    <div class="placeholder">
                        <span class="subtotal">Subtotal</span>
                        <span class="pengiriman">Ongkos kirim</span>
                        <span class="total">Total</span>
                    </div>

                    <div class="data">
                        <span class="subtotal">Rp12.000</span>
                        <span class="pengiriman">Rp0</span>
                        <span class="total">Rp12.000</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="css/update.js"></script>
    <script src="script.js"></script>
</body>

</html>