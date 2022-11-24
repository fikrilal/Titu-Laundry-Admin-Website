<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>

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

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Cari disini..">
            </div>
            <img src="./img/profile.jpg" alt="">
        </div>

        <div class="dash-content">

            <div class="activity">
                <div class="title">
                    <i class="uil uil-box"></i>
                    <span class="text">Semua produk</span>
                    <button class="btntambah" data-toggle="modal" data-target="#exampleModal">+ Tambah produk</button>
                </div>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah produk baru</h5>
                            </div>

                            <input type="text" class="form-control" id="nama" placeholder="Nama produk">
                            <input type="text" class="form-control" id="durasi" placeholder="Durasi (hari)">
                            <input type="text" class="form-control" id="harga" placeholder="Harga (per kg)">
                            <input type="text" class="form-control" id="deskripsi"
                                placeholder="Deskripsi (max: 200 kata)">

                            <div class="wrapper">
                                <form action="#">
                                    <input class="file-input" type="file" name="file" hidden>
                                    <i class="uil uil-image-plus"></i>
                                    <p>Tambahkan foto produk</p>
                                </form>
                                <section class="progress-area"></section>
                                <section class="uploaded-area"></section>
                            </div>

                            <button class="simpan-btn">Simpan</button>
                            <button class="kembali-btn" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Kembali</span>
                            </button>

                        </div>
                    </div>
                </div>

                <div class="activity-data">

                    <div class="data order-id">
                        <span class="data-title">Gambar</span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                        <span class="data-thumb"><img src="img/profile.jpg" width="20" height="20"></span>
                    </div>
                    <div class="data date">
                        <span class="data-title">Nama</span>
                        <span class="data-list">Cuci kering</span>
                        <span class="data-list">Cuci setrika</span>
                        <span class="data-list">Cuci spesial</span>
                        <span class="data-list">Cuci karpet</span>
                        <span class="data-list">Cuci express</span>
                        <span class="data-list">Cuci nama</span>
                    </div>
                    <div class="data desc">
                        <span class="data-title">Deskripsi</span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                        <span class="data-list">Minimal pemesanan untuk laundry cuci kering adalah 1 kg. Pakaian akan
                            diproses mulai dari pencucian, pewangi, hingga pengeringan. </span>
                    </div>
                    <div class="data order">
                        <span class="data-title">Durasi</span>
                        <span class="data-list">1 hari</span>
                        <span class="data-list">1 hari</span>
                        <span class="data-list">1 hari</span>
                        <span class="data-list">1 hari</span>
                        <span class="data-list">1 hari</span>
                        <span class="data-list">1 hari</span>
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
                        <span class="data-title">Action</span>
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