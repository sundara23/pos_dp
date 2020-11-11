<?php 

include '../config.php';

$trx_id = $_POST['trx_id'];
$kd_toko= $_POST['kd_toko'];
$jenis_barang = $_POST['jenis_barang'];
$dp = $_POST['trx_dp'];
$trx_dp = str_replace(".", "", $dp);
$trx_lunas = $_POST['trx_lunas'];
$trx_costumer= $_POST['trx_costumer'];
$trx_total_pembayaran = $_POST['trx_total_pembayaran'];
$trx_jenis_pembayaran = $_POST['trx_jenis_pembayaran'];
$trx_admin_id = $_POST['trx_admin_id'];
$simpan_ke = $_POST['simpan_trx'];
$sisa = $trx_lunas - $trx_dp;
$tgl = date('Y-m-d');
//echo $trx_dp.' , '.$trx_lunas.' , '.$trx_costumer.' , '.$trx_id.' , '.$trx_admin_id.' , '.$trx_jenis_pembayaran.' , '.$trx_total_pembayaran.' , '.$sisa.' , '.$simpan_ke;

if ($trx_jenis_pembayaran == 2 ){
    mysqli_query($config,"UPDATE transaksi SET jenis_barang='$jenis_barang', trx_dp='$trx_dp', trx_lunas='$trx_lunas', trx_customer='$trx_costumer', trx_ar='$sisa', trx_jenis_pembayaran='$trx_jenis_pembayaran', trx_total_pembayaran='$trx_total_pembayaran', trx_admin_id='$trx_admin_id' WHERE trx_invoice='$trx_id'");
    mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$tgl','$simpan_ke','$kd_toko','$jenis_barang','$trx_dp','','$trx_costumer','Penjualan ATK Kredit','$trx_admin_id')");
}else{
    mysqli_query($config,"UPDATE transaksi SET jenis_barang='$jenis_barang', trx_lunas='$trx_lunas', trx_jenis_pembayaran='$trx_jenis_pembayaran', trx_total_pembayaran='$trx_total_pembayaran', trx_admin_id='$trx_admin_id' WHERE trx_invoice='$trx_id'");
    mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$tgl','$simpan_ke','$kd_toko','$jenis_barang','$trx_lunas','','0','Penjualan ATK','$trx_admin_id')");
}

header("location:atk_detail.php?id=$trx_id");