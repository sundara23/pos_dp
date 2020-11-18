<?php

include '../config.php';

$id = $_POST['id'];
$id_invoice = $_POST['inv'];
$jml = $_POST['jumlah'];
$bhn= $_POST['bahan'];
$jd= $_POST['jenis_display'];
$jf= $_POST['jenis_finishing'];
$jp= $_POST['jenis_potong'];
$lf= $_POST['lok_file'];
$user= $_POST['user'];

$data = mysqli_query($config,"UPDATE orderan SET order_bahan_id='$bhn', jd_id='$jd', jf_id='$jf', jp_id='$jp', order_qty='$jml', lokasi_file='$lf', admin1='$user' WHERE order_id='$id'");
if ($data == TRUE){
    header("location:wo_detail.php?id=$id_invoice&alert=data-update");
}else{
    header("location:wo_detail.php?id=$id_invoice&alert=data-gagalupdate");
}
