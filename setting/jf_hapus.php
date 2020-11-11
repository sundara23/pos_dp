<?php

include '../config.php';
$id = $_GET['id'];

mysqli_query($config,"delete from jenis_finishing where jenis_finishing_id='$id'");

header("location:jf.php?alert=data-hapus");