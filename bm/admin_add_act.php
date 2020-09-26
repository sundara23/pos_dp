<?php 

include '../config.php';

$username = $_POST['username'];
$password = sha1($_POST['password']);
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];




mysqli_query($config,"INSERT INTO admin VALUES ('','$nama','$username','$password','$handphone','$alamat','$level')");
header("location:admin.php");