<?php
require ('koneksi.php');
// require ('edit_barang.php');

if (isset($_POST['bupdate'])){
  $id_banner = $_POST['txt_id_banner'];
  $nama_banner = $_POST['txt_nama_banner'];
  $keterangan = $_POST['txt_keterangan'];
  $nama_file = $_FILES ['banner_image']['name'];
  $source = $_FILES ['banner_image']['tmp_name'];
  $folder = 'banner/';

  move_uploaded_file($source, $folder.$nama_file);

  $update = mysqli_query($koneksi, "UPDATE banner SET image='$nama_file', nama='$nama_banner', 
          keterangan='$keterangan' WHERE id_banner ='$id_banner'");
  if($update){
    echo "<script> alert('berhasil diupdate');
    document.location='adsbanner.php';
    </script>";
    } else{
    echo "<script> alert('gagal');
    document.location='adsbanner.php';
    </script>";
    }
}
