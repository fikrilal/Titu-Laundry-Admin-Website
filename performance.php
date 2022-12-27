<?php

use LDAP\Result;

session_start();
require "koneksi.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/performance.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title> Admin Dashboard Panel </title>
</head>
<body>  <nav>  <div class="logo-name">   <div class="logo-image">
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
                <li><a href="voucher.php">
                        <i class="uil uil-pricetag-alt"></i>
                        <span class="link-name">Voucher</span>
                    </a></li>
                <li><a href="adsbanner.php">
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
                    </a></li>   </ul>
            <ul class="logout-mode">
                <li><a href="login.php">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span> </a>  </li> <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark mode</span>
                    </a>
                    <div class="mode-toggle">
                        <span class="switch"></span>  </div>   </li> </ul> </div>  </nav>
    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <form action="" method="post">
                    <input type="text" name="search-box" placeholder="Cari disini..">
                    </from>   </div>
            <img src="./img/profile.jpg" alt="">
        </div>
        <?php
        $searchbox = "";
        if (isset($_POST['search-box'])) {
            $searchbox = htmlspecialchars($_POST['search-box']);  }  ?>
        <div class="dash-content">
            <div class="overview">
                <?php
                $query = mysqli_query($koneksi, "SELECT SUM(total_harga) FROM pesanan WHERE year(curdate())");
                $row = mysqli_fetch_array($query);
                $jmlpengguna = $row['SUM(total_harga)'];
                $query1 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan WHERE year(curdate())");
                $row1 = mysqli_fetch_array($query1);
                $jmlpengguna1 = $row1['COUNT(id_pesanan)'];
                $query2 = mysqli_query($koneksi, "SELECT COUNT(id_user) FROM user WHERE year(curdate())");
                $row2 = mysqli_fetch_array($query2);
                $jmlpengguna2 = $row2['COUNT(id_user)'];
                $query3 = mysqli_query($koneksi, "SELECT SUM(total_berat) FROM pesanan WHERE year(curdate())");
                $row3 = mysqli_fetch_array($query3);
                $jmlpengguna3 = $row3['SUM(total_berat)'];
                ?>  <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="text">Pendapatan</span>
                        <span class="number"><?php echo $jmlpengguna ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-clock"></i>
                        <span class="text">Pesanan</span>
                        <span class="number"><?php echo $jmlpengguna1 ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-plane-arrival"></i>
                        <span class="text">Pengguna</span>
                        <span class="number"><?php echo $jmlpengguna2 ?></span>
                    </div>
                    <div class="box box4">
                        <i class="uil uil-plane-departure"></i>
                        <span class="text">Total cucian</span>
                        <span class="number"><?php echo $jmlpengguna3 ?> Kg</span>
                    </div>
                </div>
            </div>
            <?php
            $query =  mysqli_query($koneksi, "SELECT monthname(tanggal) AS bulan, SUM(total_harga) AS amount FROM pesanan GROUP BY MONTH(tanggal)");

            foreach ($query as $data) {
                $month[] = $data['bulan'];
                $amount[] = $data['amount'];   }  ?>
            <div class="chart" style="height: auto; width: auto;">
                <canvas id="barchart"></canvas>
            </div>
            <script>
                const ctx = document.getElementById('barchart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($month) ?>,
                        datasets: [{
                            label: 'Pedapatan',
                            data: <?php echo json_encode($amount) ?>,
                            borderWidth: 1  }]  },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true  }   }  }   });
            </script>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="order.js"></script>
    <script src="css/chart.js"></script>
    <script src="script.js"></script>
</body>

</html>