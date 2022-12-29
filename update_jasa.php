<?php
use LDAP\Result;
session_start();
require "session.php";
require ('koneksi.php');
// require ('edit_barang.php');

if (isset($_POST['bupdate'])){
  $id_jasa = $_POST['txt_id_jasa'];
  $nama_produk = $_POST['txt_jenis_jasa'];
  $deskripsi_produk = $_POST['txt_deskripsi'];
  $durasi_produk = $_POST['txt_durasi'];
  $harga_produk = $_POST['txt_harga'];
  $nama_file = $_FILES ['product_image']['name'];
  $source = $_FILES ['product_image']['tmp_name'];
  $folder = 'img/';

  move_uploaded_file($source, $folder.$nama_file);

  $update = mysqli_query($koneksi, "UPDATE jasa SET image='$nama_file', jenis_jasa='$nama_produk', 
          deskripsi='$deskripsi_produk', durasi='$durasi_produk', harga='$harga_produk' WHERE id_jasa ='$id_jasa'");
  if($update){
    echo "<script> alert('berhasil diupdate');
    document.location='product.php';
    </script>";
    } else{
    echo "<script> alert('gagal');
    document.location='product.php';
    </script>";
    }
}
