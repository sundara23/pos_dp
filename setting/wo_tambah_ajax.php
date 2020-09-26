<?php 

include '../config.php';

$nama = $_POST['nama'];
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];


mysqli_query($config,"INSERT INTO kostumer VALUES ('','$nama','$telp','$alamat','$email')");

echo mysqli_insert_id($config);