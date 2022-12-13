<?php
require "koneksi.php"

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/addproduct.css">
  <title>Upload Barang</title>
</head>

<body>

  <div class="form-input">
    <form method="POST" action="tolaction.php" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah produk baru</h5>
      </div>

      <input type="text" class="form-control" id="nama_produk" placeholder="Nama produk" name="nama_produk">
      <textarea rows="5" cols="200" name="deskripsi_produk" placeholder="Deskripsi (max: 200 kata)"></textarea>
      <input type="text" class="form-control" id="durasi_produk" placeholder="Durasi (hari)" name="durasi_produk">
      <input type="text" class="form-control" id="harga_produk" placeholder="Harga (per kg)" name="harga_produk">
      <input class="file-input" type="file" id="img" name="product_image">
      <label for="img">tested</label>

      <button type="submit" class="simpan-btn" name="simpan-btn">Simpan</button>
      <button type="submit" class="kembali-btn" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">Kembali</span>
      </button>
    </form>
  </div>
  <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>
</body>