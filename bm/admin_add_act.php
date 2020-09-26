<?php 

include '../config.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];
$kd_toko = $_POST['kd_toko'];

mysqli_query($config,"INSERT INTO admin VALUES ('','$nama','$username','$password','$handphone','$alamat','$level','$kd_toko')");
header("location:admin.php");
?>