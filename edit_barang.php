<?php
require('koneksi.php');

$id = $_GET['id_barang'];
$ambilData = "SELECT * FROM barang WHERE id_barang='$id'";
$result = mysqli_query($koneksi, $ambilData) or die(mysqli_error());
while ($data = mysqli_fetch_array($result)) {
    $id_jasa = $data['id_jasa'];
    $nama_produk = $data['jenis_jasa'];
    $deskripsi_produk = $data['deskripsi'];
    $durasi_produk = $data['durasi'];
    $harga_produk = $data['harga'];
    $product_image = $data['image'];
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Data Barang</title>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="data_barang.php">
                        <i class="uil uil-step-backward-circle"></i>
                    </a>Edit Data Barang</h5>
                <h6 class="card-subtitle mb-2 text-muted">Ubahlah data barang kamu pada kolom-kolom dibawah ini</h6>
                <form method="POST" action="update_barang.php" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ubah Gambar</label>
                            <input type="file" name="gbr_produk" class="form-control" id="exampleFormControlInput1" required="" value="<?php echo $data['image']; ?>">
                            <section class="upload.php"></section>
                        </div>

                        <input type="hidden" class="form-control" name="txt_idbarang" value="<?php echo $data['id_jasa']; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_nama" value="<?php echo $data['jenis_jasa']; ?>" placeholder="Masukkan nama barang...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_warna" value="<?php echo $data['deskripsi']; ?>" placeholder="Masukkan warna...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_nama" value="<?php echo $data['durasi']; ?>" placeholder="Masukkan nama barang...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_warna" value="<?php echo $data['harga']; ?>" placeholder="Masukkan warna...">
                        </div>
                        <div class="col-4">
                            <a href="data_barang.php" class="btn btn-danger mb-3">Batal</a>
                            <button type="submit" class="btn btn-success mb-3" name="bupdate">Update</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>