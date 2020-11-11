<?php

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO jenis_finishing VALUES ('','$nama')");
header("location:jf.php?alert=data-add");