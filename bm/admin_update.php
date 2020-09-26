<?php 

include '../config.php';
$id = $_POST['id'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$handphone = $_POST['handphone'];
$alamat = $_POST['alamat'];
$level = $_POST['level'];

mysqli_query($config,"update admin set nama='$nama', username='$username', handphone='$handphone', alamat='$alamat', level='$level' where id='$id'");
header("location:admin.php");