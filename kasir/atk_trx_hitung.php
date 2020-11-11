<?php 

include '../config.php';

$id_invoice = $_POST['id_invoice'];
$id_order = $_POST['id_order_atk'];
$lvlhrg = $_POST['level_harga'];
$qty = $_POST['jumlah_order'];

$lvl = mysqli_query($config,"select * from level_harga where id_level_harga='$lvlhrg'");
$lh = mysqli_fetch_assoc($lvl);
$level_harga = $lh['harga_level'];
$hitunglevel = $level_harga * $qty;
//echo $level_harga.' === '.$hitunglevel;

mysqli_query($config,"update orderan_atk set id_level_harga='$lvlhrg', order_qty='$qty', order_harga_subtotal='$hitunglevel' where order_atk_id='$id_order'");

header("location:atk_trx_edit.php?id=$id_invoice");