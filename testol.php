<?php
require "koneksi.php"

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Upload Barang</title>
</head>

<body>
  <div class="container-fluid mt-4">
    <div class="card" style="width: 50rem;">
      <div class="card-body">
        <h5 class="card-title"><a href="product.php">
            <i class="uil uil-step-backward-circle"></i>
          </a>Upload Barang</h5>
        <h6 class="card-subtitle mb-2 text-muted">Masukan data barang kamu pada kolom kolom dibawah ini</h6>
        <form method="POST" action="tolaction.php" enctype="multipart/form-data">
          <div class="container-fluid">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tambah Gambar</label>
              <input type="file" name="product_image" class="form-control" id="exampleFormControlInput1" required="">
              <section class="upload.php"></section>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_produk" placeholder="masukan nama barang...">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Deskripsi Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="deskripsi_produk" placeholder="masukan nama barang...">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Durasi Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="durasi_produk" placeholder="masukan nama barang...">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Harga Barang</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="harga_produk" placeholder="masukan nama barang...">
            </div>
            <div class="col-4">
              <button type="reset" class="btn btn-danger mb-3">Kosongkan</button>
              <button type="submit" class="btn btn-success mb-3" name="simpan-btn">Simpan</button>
            </div>
          </div>
      </div>
    </div>
    </form>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>
</body>