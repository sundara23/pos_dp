<?php

include '../config.php';

$nama = $_POST['nama'];

mysqli_query($config,"INSERT INTO jenis_potong VALUES ('','$nama')");
header("location:jp.php?alert=data-add");