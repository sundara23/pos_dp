<?php 

include '../config.php';

$nama = $_POST['nama'];
$hpp = $_POST['hpp'];

mysqli_query($config,"INSERT INTO jenis_display VALUES ('','$nama','$hpp')");
header("location:ma.php?alert=data-add");