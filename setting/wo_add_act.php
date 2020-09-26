<?php 

include '../config.php';

$kostumer = $_POST['kostumer'];
$id_hj = $_POST['id_hj'];
$harga_satuan = $_POST['harga_satuan'];
$sub_total = $_POST['sub_total'];
$jumlah = $_POST['jumlah'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];

$datetime = date('Y-m-d H:i:s');

$keterangan = "Ukuran : ".$panjang."x".$lebar."<br/>Luas : ".$lebar." (Meter Persegi)";

$tgl = date('Y-m-d');

mysqli_query($config,"INSERT INTO invoice VALUES ('','$tgl','$kostumer','0','','','','$sub_total','','$kd_toko','$id_admin')");

$id_terakhir = mysqli_insert_id($config);


mysqli_query($config,"INSERT INTO orderan VALUES ('','$kd_toko','$id_terakhir','$id_hj','$keterangan','$jumlah','$harga_satuan','$sub_total','$datetime')");
header("location:wo_edit.php?id=$id_terakhir&alert=data-add");