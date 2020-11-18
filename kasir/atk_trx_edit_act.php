<?php 

include '../config.php';

$trx_id = $_POST['id_invoice'];
$kd_toko = $_POST['kd_toko'];
$id_admin = $_POST['id_admin'];
$jns_brg = $_POST['jenis_barang'];
$produk_id = $_POST['produk_atk'];
$datetime = date('Y-m-d H:i:s');

$data = mysqli_query($config,"select * from orderan_atk where order_atk_inv='$trx_id' and kd_produk='$produk_id'");
$p = mysqli_fetch_assoc($data);
if($p == null){
    $tambahproduk = mysqli_query($config,"INSERT INTO orderan_atk VALUES ('','$kd_toko','$trx_id','$produk_id','','','','$datetime')");
    if ($tambahproduk == TRUE){
        header("location:atk_trx_edit.php?id=$trx_id&alert=data-add");
    }else{
        header("location:atk_trx_edit.php?id=$trx_id&alert=data-gagal");
    }
}else{
    header("location:atk_trx_edit.php?id=$trx_id&alert=data-sudahada");
}