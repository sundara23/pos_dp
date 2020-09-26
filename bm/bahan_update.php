<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$tipe = $_POST['tipe'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update bahan set bahan_nama='$nama', bahan_kategori='$kategori', bahan_hpp='$hpp' where bahan_id='$id'");
header("location:ma.php?alert=data-update");