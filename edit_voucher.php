<?php
use LDAP\Result;
session_start();
require "session.php";
require('koneksi.php');
// require('update_jasa.php');

$id_voucher = $_GET['id_voucher'];
$ambilData = "SELECT * FROM voucher WHERE id_voucher='$id_voucher'";
$result = mysqli_query($koneksi, $ambilData) or die();
while ($data = mysqli_fetch_array($result)) {
    $id_voucher = isset($data['id_voucher']) ? $data['id_voucher'] : '';
    $nama_voucher = isset($data['nama']) ? $data['nama'] : '';
    $potongan_harga = isset($data['potongan_harga']) ? $data['potongan_harga'] : '';
    $slot_voucher = isset($data['slot_voucher']) ? $data['slot_voucher'] : '';
    $tgl_expired = isset($data['tgl_expired']) ? $data['tgl_expired'] : '';
}
?>

<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/addproduct.css">
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
                <li><a href="login.php" onclick="return confirm('Apakah anda yakin ingin keluar?')">
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
            <img src="./img/profile.svg" alt="">
        </div>
        <?php
        $searchbox = "";
        if (isset($_POST['search-box'])) {
            $searchbox = htmlspecialchars($_POST['search-box']);
        }
        ?>

        <div class="form-input">
            <form method="POST" action="update_voucher.php" enctype="multipart/form-data">
                <h5>Edit voucher diskon</h5>

                <input type="hidden" class="form-control" name="txt_id_voucher" value="<?php echo $id_voucher; ?>">
                <span>Nama voucher</span>
                <input type="text" class="form-control" id="nama_voucher" placeholder="Nama voucher" name="txt_nama_voucher" value="<?php echo $nama_voucher; ?>">
                <span>Potongan harga</span>
                <input type="text" class="form-control" id="potongan_harga" placeholder="Potongan harga" name="txt_potongan_harga" value="<?php echo $potongan_harga; ?>">
                <span>Slot voucher</span>
                <input type="text" class="form-control" id="slot_voucher" placeholder="Slot voucher" name="txt_slot_voucher" value="<?php echo $slot_voucher; ?>">
                <span>Tanggal expired</span>
                <input type="date" class="form-control" id="tgl_expired" placeholder="Tanggal expired" name="txt_tgl_expired" value="<?php echo $tgl_expired; ?>">

                <div class="tomboledit">
                    <button type="submit" class="simpan-btn" name="bupdate">Simpan</button>
                    <span class="data-action"> <a href="hapus_voucher.php?id_voucher=<?php echo $id_voucher; ?>" onclick="return confirm('Apakah anda yakin mau menghapus voucher ini?')">
                            <button type="button" class="btnhapus" data-toggle="modal" data-target="#exampleModal">Hapus produk</button>
                        </a></span>
                    <button type="submit" class="kembali-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #2F80ED;">Kembali</span>
                    </button>
                </div>

            </form>
        </div>

    </section>

    <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>