<?php

@include 'koneksi.php';
$id_pesanan = $_GET['id_pesanan'];

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
            <a href="testt.php?id_pesanan=<?php echo $id_pesanan?>">
                    <button href="testt.php?id_pesanan=<?php echo $id_pesanan?>" name="update" type="button" class="btnsimpan" data-toggle="modal" data-target="#exampleModal">Simpan</button>
                </a>

                <div class="title">
                    <span class="text">Detail pesanan nomor #<?php echo $id_pesanan;?></span>
                    <span class="subtext">Pembayaran melalui transfer Bank BRI</span>
                </div>

                <?php
                    $query = mysqli_query($koneksi, "SELECT status_pesanan FROM pesanan WHERE id_pesanan = '$id_pesanan'");
                    $row = mysqli_fetch_array($query);
                    $status_pesanan = $row['status_pesanan'];
                ?>

                <div class="dropdown">
                    <div class="select-btn">
                        <span><?php echo $status_pesanan;?></span>
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

                <?php
                    $query = mysqli_query($koneksi, "SELECT `alamat_penjemputan`, DATE_FORMAT(waktu_penjemputan, '%d %M %Y'), DATE_FORMAT(waktu_penjemputan, '%k:%i'), `alamat_pengiriman`, DATE_FORMAT(waktu_antar, '%d %M %Y'), DATE_FORMAT(waktu_antar, '%k:%i'), user.nama, user.no_telpon FROM `pesanan` JOIN user ON pesanan.id_user = user.id_user WHERE id_pesanan='$id_pesanan'");
                    $row = mysqli_fetch_array($query);
                    $alamat_penjemputan = $row['alamat_penjemputan'];
                    $waktu_penjemputan = $row["DATE_FORMAT(waktu_penjemputan, '%d %M %Y')"];
                    $jam_penjemputan = $row["DATE_FORMAT(waktu_penjemputan, '%k:%i')"];
                    $alamat_pengiriman = $row['alamat_pengiriman'];
                    $waktu_antar = $row["DATE_FORMAT(waktu_antar, '%d %M %Y')"];
                    $jam_antar = $row["DATE_FORMAT(waktu_antar, '%k:%i')"];
                    $nama = $row["nama"];
                    $no_telpon = $row["no_telpon"];
                ?>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-plane-arrival"></i>
                        <span class="text">Waktu penjemputan</span>
                        <span class="number"><?php echo $jam_penjemputan;?> - <?php echo $waktu_penjemputan;?></span>
                        <span class="text2">Alamat penjemputan</span>
                        <span class="number"><?php echo $nama;?></span>
                        <span class="number"><?php echo $alamat_penjemputan;?></span>
                        <span class="number"><?php echo $no_telpon;?></span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-plane-departure"></i>
                        <span class="text">Waktu pengiriman</span>
                        <span class="number"><?php echo $jam_antar;?> - <?php echo $waktu_antar;?></span>
                        <span class="text2">Alamat pengiriman</span>
                        <span class="number"><?php echo $nama;?></span>
                        <span class="number"><?php echo $alamat_pengiriman;?></span>
                        <span class="number"><?php echo $no_telpon;?></span>
                    </div>
                </div>
            </div>

            <?php
            $query1 = mysqli_query($koneksi, "SELECT jasa.jenis_jasa, jasa.harga, SUM(total_berat*jasa.harga), total_berat, harga_diskon, total_harga FROM pesanan JOIN jasa ON pesanan.id_jasa = jasa.id_jasa WHERE id_pesanan = '$id_pesanan'");
            $row1 = mysqli_fetch_array($query1);
            $jenis_jasa = $row1['jenis_jasa'];
            $jasaharga = $row1['harga'];
            $total_berat = $row1['total_berat'];
            $total_harga = $row1['total_harga'];
            $total_harga1 = $row1['SUM(total_berat*jasa.harga)'];
            $harga_diskon = $row1['harga_diskon'];
            ?>

            <div class="activity">
                <div class="activity-data">
                    <div class="data date">
                        <span class="data-title">Pesanan</span>
                        <span class="data-list"><?php echo $jenis_jasa?></span>
                    </div>
                    <div class="data desc">
                        <span class="data-title">Harga</span>
                        <span class="data-list"><?php echo $jasaharga?></span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Berat cucian</span>
                        <span class="data-list"><?php echo $total_berat?></span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Total</span>
                        <span class="data-list"><?php echo $total_harga1?></span>
                    </div>
                </div>

                <div class="rincian">
                    <div class="placeholder">
                        <span class="subtotal">Subtotal</span>
                        <span class="pengiriman">Harga diskon</span>
                        <span class="total">Total</span>
                    </div>

                    <div class="data">
                        <span class="subtotal"><?php echo $total_harga1?></span>
                        <span class="pengiriman"><?php echo $harga_diskon ?></span>
                        <span class="total"><?php echo $total_harga?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="css/update.js"></script>
    <script src="script.js"></script>
</body>

</html>