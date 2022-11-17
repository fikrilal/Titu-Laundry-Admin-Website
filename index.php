<?php
    session_start();
    require "koneksi.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title> Admin Dashboard Panel </title>
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
                <li><a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dashboard</span>
                    </a></li>
                <li><a href="product.php">
                        <i class="uil uil-box"></i>
                        <span class="link-name">Product</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="link-name">Order</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-tachometer-fast-alt"></i>
                        <span class="link-name">Performance</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="login.php">
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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Cari disini..">
            </div>
            <img src="./img/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-arrow-circle-up"></i>
                    <span class="text">Dashboard</span>
                </div>

                <?php
                    $query = mysqli_query($koneksi, "SELECT COUNT(id_user) FROM user");
                    $row = mysqli_fetch_array($query);
                    $jmlpengguna = $row['COUNT(id_user)'];

                    $query1 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan), SUM(total_harga) FROM pesanan");
                    $row1 = mysqli_fetch_array($query1);
                    $jmlpesanan = $row1['COUNT(id_pesanan)'];
                    $jmlharga = $row1['SUM(total_harga)'];

                    $query2 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan");
                    $row2 = mysqli_fetch_array($query2);
                    $jmlpesanan = $row2['COUNT(id_pesanan)'];
                    ?>

<div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-user"></i>
                        <span class="text">Pengguna</span>
                        <span class="number"><?php echo $jmlpengguna?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-shopping-bag"></i>
                        <span class="text">Pesanan</span>
                        <span class="number"><?php echo $jmlpesanan?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-money-bill"></i>
                        <span class="text">Pendapatan</span>
                        <span class="number"><?php echo $jmlharga?></span>
                    </div>
                    <div class="box box4">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="text">Pesanan berjalan</span>
                        <span class="number">35</span>
                    </div>
                </div>
            </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-shopping-cart"></i>
                    <span class="text">Pesanan terbaru</span>
                </div>

                <div class="activity-data">
                    <div class="data order-id">
                        <span class="data-title">Order ID</span>
                        <span class="data-list">#6548</span>
                        <span class="data-list">#6549</span>
                        <span class="data-list">#6550</span>
                        <span class="data-list">#6551</span>
                        <span class="data-list">#6552</span>
                        <span class="data-list">#6553</span>
                    </div>
                    <div class="data date">
                        <span class="data-title">Tanggal</span>
                        <span class="data-list">11 Nov 2022</span>
                        <span class="data-list">11 Nov 2022</span>
                        <span class="data-list">11 Nov 2022</span>
                        <span class="data-list">11 Nov 2022</span>
                        <span class="data-list">11 Nov 2022</span>
                        <span class="data-list">11 Nov 2022</span>
                    </div>
                    <div class="data name">
                        <span class="data-title">Nama</span>
                        <span class="data-list">Ahmad Fikril</span>
                        <span class="data-list">Ahmad Fikril</span>
                        <span class="data-list">Ahmad Fikril</span>
                        <span class="data-list">Ahmad Fikril</span>
                        <span class="data-list">Ahmad Fikril</span>
                        <span class="data-list">Ahmad Fikril</span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Pesanan</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci kering</span>
                    </div>
                    <div class="data weight">
                        <span class="data-title">Berat</span>
                        <span class="data-list">3 Kg</span>
                        <span class="data-list">3 Kg</span>
                        <span class="data-list">3 Kg</span>
                        <span class="data-list">3 Kg</span>
                        <span class="data-list">3 Kg</span>
                        <span class="data-list">3 Kg</span>
                    </div>
                    <div class="data price">
                        <span class="data-title">Harga</span>
                        <span class="data-list">Rp12.000</span>
                        <span class="data-list">Rp12.000</span>
                        <span class="data-list">Rp12.000</span>
                        <span class="data-list">Rp12.000</span>
                        <span class="data-list">Rp12.000</span>
                        <span class="data-list">Rp12.000</span>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <span class="data-list">Sedang diproses</span>
                        <span class="data-list">Sedang diproses</span>
                        <span class="data-list">Sedang diproses</span>
                        <span class="data-list">Sedang diproses</span>
                        <span class="data-list">Sedang diproses</span>
                        <span class="data-list">Sedang diproses</span>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <script src="script.js"></script>
</body>

</html>