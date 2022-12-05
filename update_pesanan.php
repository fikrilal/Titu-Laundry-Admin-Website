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
                <li><a href="order.php">
                        <i class="uil uil-shopping-cart"></i>
                        <span class="link-name">Order</span>
                    </a></li>
                <li><a href="#">
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

            <div class="activity">
                <div class="title">
                    <!-- <i class="uil uil-box"></i> -->
                    <span class="text">Detail pesanan nomor #583</span>
                </div>

                <div class="activity-data">

                    <div class="data order-id">
                        <span class="data-title">Gambar</span>
                        <?php
                        $sql = "SELECT image FROM `jasa`";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-thumb"><img src="img/<?php echo $siswa['image'] ?>" style="height: 56; width: 56; object-fit: cover; border-radius: 5px;"></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data date">
                        <span class="data-title">Pesanan</span>
                        <?php
                        $sql = "SELECT jenis_jasa FROM `jasa`";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['jenis_jasa'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data desc">
                        <span class="data-title">Deskripsi</span>
                        <?php
                        $sql = "SELECT deskripsi FROM `jasa`";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['deskripsi'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Durasi</span>
                        <?php
                        $sql = "SELECT durasi FROM `jasa`";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['durasi'] ?></span>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="data order">
                        <span class="data-title">Durasi</span>
                        <?php
                        $sql = "SELECT durasi FROM `jasa`";
                        $query = mysqli_query($koneksi, $sql);

                        while ($siswa = mysqli_fetch_array($query)) {
                        ?>
                            <span class="data-list"><?php echo $siswa['durasi'] ?></span>
                        <?php
                        }
                        ?>
                    </div>

                </div>

                </div>
            </div>
    </section>

        
    </body>
</html>