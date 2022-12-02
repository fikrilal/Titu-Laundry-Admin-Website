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
    <link rel="stylesheet" href="css/order.css">
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
                <li><a href="index.php">
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
                <form action="" method="post">
                <input type="text" placeholder="Cari disini..">
                </from>
            </div>
            <img src="./img/profile.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="overview">

                <?php
                $tgl='date("Y-m-d")';
                $query4 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan WHERE tanggal ='$tgl'");
                $count = mysqli_num_rows($query4);
                ?>

                <div class="notification">
                    <i class="uil uil-bell"></i>
                    <span class="text"><?php echo $count?> Pesanan hari ini menunggu diproses</span>
                </div>

                <?php
                $query = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan");
                $row = mysqli_fetch_array($query);
                $jmlpengguna = $row['COUNT(id_pesanan)'];

                $query1 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan='Sedang diproses'");
                $row1 = mysqli_fetch_array($query1);
                $jmlpengguna1 = $row1['COUNT(id_pesanan)'];

                $query2 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan='Sedang diantar'");
                $row2 = mysqli_fetch_array($query2);
                $jmlpengguna2 = $row2['COUNT(id_pesanan)'];

                $query3 = mysqli_query($koneksi, "SELECT COUNT(id_pesanan) FROM pesanan WHERE status_pesanan='Sedang dijemput'");
                $row3 = mysqli_fetch_array($query3);
                $jmlpengguna3 = $row3['COUNT(id_pesanan)'];
                ?>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="text">Pesanan masuk</span>
                        <span class="number"><?php echo $jmlpengguna ?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-clock"></i>
                        <span class="text">Menunggu diproses</span>
                        <span class="number"><?php echo $jmlpengguna1 ?></span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-plane-arrival"></i>
                        <span class="text">Perlu dijemput</span>
                        <span class="number"><?php echo $jmlpengguna3 ?></span>
                    </div>
                    <div class="box box4">
                        <i class="uil uil-plane-departure"></i>
                        <span class="text">Perlu dikirim</span>
                        <span class="number"><?php echo $jmlpengguna2 ?></span>
                    </div>
                </div>
            </div>

            <div class="menu">
                <input type="radio" name="select" id="option-1" checked>
                <input type="radio" name="select" id="option-2">
                <input type="radio" name="select" id="option-3">
                <input type="radio" name="select" id="option-4">
                <label for="option-1" class="option option-1" onclick="opsiMenu(event, 'Semua')" id="defaultOpen">
                <script>
                    // Untuk autoclick kategori "Diproses" saat halaman diload
                    window.onload = function() {
                    document.getElementById("defaultOpen").click();
                    }
                    </script>
                    <div class="dot"></div>
                    <span>Semua</span>
                </label>
                <label for="option-2" class="option option-2" onclick="opsiMenu(event, 'Diproses')">
                    <div class="dot"></div>
                    <span>Diproses</span>
                </label>
                <label for="option-3" class="option option-3" onclick="opsiMenu(event, 'Dijemput')">
                    <div class="dot"></div>
                    <span>Dijemput</span>
                </label>
                <label for="option-4" class="option option-4" onclick="opsiMenu(event, 'Diantar')">
                    <div class="dot"></div>
                    <span>Diantar</span>
                </label>
            </div>

            <div id="Semua" class="activity activity-1">
                <div class="activity-data">
                    <div class="data order-id">
                        <span class="data-title">Order ID</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list">#<?php echo $siswa['id_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data date">
                        <span class="data-title">Tanggal</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['tanggal'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data name">
                        <span class="data-title">Nama</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['nama'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Pesanan</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['jenis_jasa'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data weight">
                        <span class="data-title">Berat</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_berat'] ?> KG</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data price">
                        <span class="data-title">Harga</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_harga'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['status_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="Diproses" class="activity activity-2">
                <div class="activity-data">
                    <div class="data order-id">
                        <span class="data-title">Order ID</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list">#<?php echo $siswa['id_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data date">
                        <span class="data-title">Tanggal</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['tanggal'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data name">
                        <span class="data-title">Nama</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['nama'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Pesanan</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['jenis_jasa'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data weight">
                        <span class="data-title">Berat</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_berat'] ?> KG</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data price">
                        <span class="data-title">Harga</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_harga'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diproses'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['status_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="Dijemput" class="activity activity-3">
                <div class="activity-data">
                    <div class="data order-id">
                        <span class="data-title">Order ID</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list">#<?php echo $siswa['id_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data date">
                        <span class="data-title">Tanggal</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['tanggal'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data name">
                        <span class="data-title">Nama</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['nama'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Pesanan</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['jenis_jasa'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data weight">
                        <span class="data-title">Berat</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_berat'] ?> KG</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data price">
                        <span class="data-title">Harga</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_harga'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang dijemput'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['status_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="Diantar" class="activity activity-4">
                <div class="activity-data">
                    <div class="data order-id">
                        <span class="data-title">Order ID</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list">#<?php echo $siswa['id_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data date">
                        <span class="data-title">Tanggal</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['tanggal'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data name">
                        <span class="data-title">Nama</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['nama'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Pesanan</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['jenis_jasa'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data weight">
                        <span class="data-title">Berat</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_berat'] ?> KG</span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data price">
                        <span class="data-title">Harga</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['total_harga'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data status">
                        <span class="data-title">Status</span>
                        <?php
                        $sql = "SELECT id_pesanan, tanggal, user.nama, jasa.jenis_jasa, total_berat, total_harga, status_pesanan FROM `pesanan`  JOIN user ON pesanan.id_user = user.id_user JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE status_pesanan='Sedang diantar'";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['status_pesanan'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <script src="order.js"></script>
    <script src="script.js"></script>
</body>

</html>