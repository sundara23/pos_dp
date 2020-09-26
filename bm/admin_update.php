<?php 

include '../config.php';
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];
$kd_toko = $_POST['kd_toko'];

mysqli_query($config,"update admin set nama='$nama', username='$username', handphone='$handphone', alamat='$alamat', level='$level', kd_toko='$kd_toko' where id='$id'");
header("location:admin.php");