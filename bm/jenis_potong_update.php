<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update jenis_potong set jenis_potong_nama='$nama', jenis_potong_kategori='$kategori', jenis_potong_hpp='$hpp' where jenis_potong_id='$id'");
header("location:ma.php?alert=data-update");