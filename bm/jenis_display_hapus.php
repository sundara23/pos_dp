<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from jenis_display where jenis_display_id='$id'");

header("location:ma.php?alert=data-hapus");