<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];


mysqli_query($config,"update jenis_display set jenis_display_nama='$nama' where jenis_display_id='$id'");
header("location:jd.php?alert=data-update");