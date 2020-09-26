<?php 

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from mesin where mesin_id='$id'");

header("location:ma.php?alert=data-hapus");