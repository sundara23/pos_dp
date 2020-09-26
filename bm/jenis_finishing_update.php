<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$kategori = $_POST['kategori'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update jenis_finishing set jenis_finishing_nama='$nama', jenis_finishing_kategori='$kategori', jenis_finishing_hpp='$hpp' where jenis_finishing_id='$id'");
header("location:ma.php?alert=data-update");