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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Edit Data Barang</title>
</head>

<body>
    <div class="container-fluid mt-4">
        <div class="card" style="width: 50rem;">
            <div class="card-body">
                <h5 class="card-title"><a href="product.php">
                        <i class="uil uil-step-backward-circle"></i>
                    </a>Edit Data Barang</h5>
                <h6 class="card-subtitle mb-2 text-muted">Ubahlah data barang kamu pada kolom-kolom dibawah ini</h6>
                <form method="POST" action="update_jasa.php" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Ubah Gambar</label>
                            <input type="file" name="product_image" class="form-control" id="exampleFormControlInput1" required="" value="<?php echo $product_image; ?>">
                            <section class="upload.php"></section>
                        </div>

                        <input type="hidden" class="form-control" name="txt_id_jasa" value="<?php echo $id_jasa; ?>">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_jenis_jasa" value="<?php echo $nama_produk; ?>" placeholder="Masukkan nama barang...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_deskripsi" value="<?php echo $deskripsi_produk; ?>" placeholder="Masukkan warna...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_durasi" value="<?php echo $durasi_produk; ?>" placeholder="Masukkan nama barang...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Warna</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="txt_harga" value="<?php echo $harga_produk; ?>" placeholder="Masukkan warna...">
                        </div>
                        <div class="col-4">
                        <span class="data-action"> <a href="hapus_produk.php?id_jasa=<?php echo $id_jasa; ?>">
                                    <button type="button" class="btnhapus" data-toggle="modal" data-target="#exampleModal">Manage</button>
                                </a> </span><a href="product.php" class="btn btn-danger mb-3">Batal</a>
                            <button type="submit" class="btn btn-success mb-3" name="bupdate">Update</button>
                        </div>
                    </div>
            </div>
        </div>
        </form>
        <script type="text/javascript" src="js/bootstrap.bundle.min.js>"></script>
</body>

</html>