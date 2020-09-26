<?php 

include '../config.php';

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$kd_toko = $_POST['kd_toko'];


mysqli_query($config,"INSERT INTO kostumer VALUES ('','$nama','$telp','$alamat','$email','$kd_toko')");

echo mysqli_insert_id($config);