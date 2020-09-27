<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update satuan_bahan set nama_satuan='$nama' where kd_satuan='$id'");
header("location:satuan_bahan.php?alert=data-update");