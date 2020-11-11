<?php

include '../config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];


mysqli_query($config,"update jenis_potong set jenis_potong_nama='$nama' where jenis_potong_id='$id'");
header("location:jp.php?alert=data-update");