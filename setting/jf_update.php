<?php

include '../config.php';
$id = $_POST['id'];
$nama = $_POST['nama'];


mysqli_query($config,"update jenis_finishing set jenis_finishing_nama='$nama' where jenis_finishing_id='$id'");
header("location:jf.php?alert=data-update");