<?php 

include '../config.php';
$id = $_POST['id'];

$nama = $_POST['nama'];
$hpp = $_POST['hpp'];


mysqli_query($config,"update jenis_display set jenis_display_nama='$nama', jenis_display_hpp='$hpp' where jenis_display_id='$id'");
header("location:ma.php?alert=data-update");