<?php 

include '../config.php';

$kostumer = $_POST['kostumer'];
$harga_satuan = $_POST['harga_satuan'];
$sub_total = $_POST['sub_total'];
$jumlah = $_POST['jumlah'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$id_bahan = $_POST['id_bahan'];

$datetime = date('Y-m-d H:i:s');

$tgl = date('Y-m-d');

mysqli_query($config,"INSERT INTO transaksi VALUES ('','$tgl','$kostumer','0','','','','$sub_total','','$kd_toko','$id_admin')");

$id_terakhir = mysqli_insert_id($config);

header("location:wo_edit.php?id=$id_terakhir&alert=data-add");