<?php 

include '../config.php';

$trx_id = $_POST['trx_id'];
$kd_toko= $_POST['kd_toko'];
$jenis_barang = $_POST['jenis_barang'];
$dp = $_POST['trx_dp'];
$type = $_POST['type'];
$trx_dp = str_replace(".", "", $dp);
$trx_lunas = $_POST['trx_lunas'];
$trx_costumer= $_POST['trx_costumer'];
$trx_total_pembayaran = $_POST['trx_total_pembayaran'];
$trx_jenis_pembayaran = $_POST['trx_jenis_pembayaran'];
$trx_admin_id = $_POST['trx_admin_id'];
$simpan_ke = $_POST['simpan_trx'];
$sisa = $trx_lunas - $trx_dp;
$tgl = date('Y-m-d');
$datetime = date('Y-m-d H:i:s');
$jumlahtype = count($type);
//echo $trx_dp.' , '.$trx_lunas.' , '.$trx_costumer.' , '.$trx_id.' , '.$trx_admin_id.' , '.$trx_jenis_pembayaran.' , '.$trx_total_pembayaran.' , '.$sisa.' , '.$simpan_ke;

if ($trx_jenis_pembayaran == 2 ){

    $data1 = mysqli_query($config,"UPDATE transaksi SET jenis_barang='$jenis_barang', trx_dp='$trx_dp', trx_lunas='$trx_lunas', trx_customer='$trx_costumer', trx_ar='$sisa', trx_jenis_pembayaran='$trx_jenis_pembayaran', trx_total_pembayaran='$trx_total_pembayaran', trx_admin_id='$trx_admin_id' WHERE trx_invoice='$trx_id'");
    $data2 = mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$datetime','$kd_toko','$trx_costumer','Penjualan Kredit Percetakan','$trx_admin_id')");
    if ($data1 == TRUE && $data2 == TRUE){
        $tampil = mysqli_query($config, "SELECT LAST_INSERT_ID()");
        while ($r=mysqli_fetch_array($tampil)){
            $id = $r[0];
            for ($x = 0; $x < $jumlahtype; $x++) {
                mysqli_query($config, "INSERT INTO arus_kas_subentry VALUES ('','$kd_toko','$id','$simpan_ke[$x]','$trx_dp','$type[$x]')");
            }
        }
        header("location:piutang_setting_ctk.php?id=$trx_id");
    }else{
        header("location:wo_edit.php?id=$trx_id&alert=data-kesalahansistem");
    }
}else{
    $data3 = mysqli_query($config,"UPDATE transaksi SET jenis_barang='$jenis_barang', trx_lunas='$trx_lunas', trx_jenis_pembayaran='$trx_jenis_pembayaran', trx_total_pembayaran='$trx_total_pembayaran', trx_admin_id='$trx_admin_id' WHERE trx_invoice='$trx_id'");
    $data4 = mysqli_query($config,"INSERT INTO arus_kas VALUES ('','$datetime','$kd_toko','$trx_costumer','Penjualan Tunai Percetakan','$trx_admin_id')");
    if ($data3 == TRUE && $data4 == TRUE){
        $tampil = mysqli_query($config, "SELECT LAST_INSERT_ID()");
        while ($r=mysqli_fetch_array($tampil)) {
            $id = $r[0];
            for ($x = 0; $x < $jumlahtype; $x++) {
                mysqli_query($config, "INSERT INTO arus_kas_subentry VALUES ('','$kd_toko','$id','$simpan_ke[$x]','$trx_lunas','$type[$x]')");
            }
        }
        header("location:wo_edit.php?id=$trx_id");
    }else{
        header("location:wo_edit.php?id=$trx_id&alert=data-kesalahansistem");
    }
}
