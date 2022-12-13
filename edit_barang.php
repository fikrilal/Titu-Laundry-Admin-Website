<?php
require('koneksi.php');
// require('update_jasa.php');

$id_jasa = $_GET['id_jasa'];
$ambilData = "SELECT * FROM jasa WHERE id_jasa='$id_jasa'";
$result = mysqli_query($koneksi, $ambilData) or die();
while ($data = mysqli_fetch_array($result)) {
    $id_jasa = isset($data['id_jasa']) ? $data['id_jasa'] : '';
    $nama_produk = isset($data['jenis_jasa']) ? $data['jenis_jasa'] : '';
    $deskripsi_produk = isset($data['deskripsi']) ? $data['deskripsi'] : '';
    $durasi_produk = isset($data['durasi']) ? $data['durasi'] : '';
    $harga_produk = isset($data['harga']) ? $data['harga'] : '';
    $product_image = isset($data['image']) ? $data['image'] : '';
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="css/addproduct.css">
    <title>Edit Data Barang</title>
</head>

<body>
    <div class="form-input">
        <form method="POST" action="update_jasa.php" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah produk baru</h5>
            </div>

            <input type="hidden" class="form-control" name="txt_id_jasa" value="<?php echo $id_jasa; ?>">
            <input type="text" class="form-control" id="nama_produk" placeholder="Nama produk"  name="txt_jenis_jasa" value="<?php echo $nama_produk; ?>">
            <input rows="5" cols="200" id="deskripsi_produk" placeholder="Deskripsi (max: 200 kata)" name="txt_deskripsi" value="<?php echo $deskripsi_produk; ?>">
            <input type="text" class="form-control" id="durasi_produk" placeholder="Durasi (hari)" name="txt_durasi" value="<?php echo $durasi_produk; ?>">
            <input type="text" class="form-control" id="harga_produk" placeholder="Harga (per kg)" name="txt_harga" value="<?php echo $harga_produk; ?>">
            <input class="file-input" type="file" id="exampleFormControlInput1" required="" name="product_image" value="<?php echo $product_image; ?>">
            <label for="img">tested</label>

            <button type="submit" class="simpan-btn" name="bupdate">Simpan</button>
            <span class="data-action">
                <a href="hapus_produk.php?id_jasa=<?php echo $id_jasa; ?>">
                    <button type="button" class="btnhapus" data-toggle="modal" data-target="#exampleModal">Hapus produk</button>
                </a></span>
            <button type="submit" class="kembali-btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">Kembali</span>
            </button>
        </form>
    </div>

    <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>