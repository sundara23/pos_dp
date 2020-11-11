<?php 

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO jenis_display VALUES ('','$nama')");
header("location:jd.php?alert=data-add");