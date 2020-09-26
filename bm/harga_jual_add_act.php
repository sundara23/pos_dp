<?php 

include '../config.php';
if(isset($_POST['produk'])){
	$produk = $_POST['produk'];	
}else{
	$produk = 0;
}
if(isset($_POST['id_bahan'])){
	$bahan = $_POST['id_bahan'];	
}else{
	$bahan = 0;
}
if(isset($_POST['id_mesin'])){
	$mesin = $_POST['id_mesin'];	
}else{
	$mesin = 0;
}
if(isset($_POST['id_finishing'])){
	$finishing = $_POST['id_finishing'];	
}else{
	$finishing = 1;
}
if(isset($_POST['id_potong'])){
	$potong = $_POST['id_potong'];	
}else{
	$potong = 1;
}
if(isset($_POST['ukuran'])){
	$ukuran = $_POST['ukuran'];	
}else{
	$ukuran = "";
}
if(isset($_POST['id_display'])){
	$display = $_POST['id_display'];	
}else{
	$display = 1;
}
if(isset($_POST['hargajual'])){
	$harga = $_POST['hargajual'];	
}else{
	$harga = 0;
}
if(isset($_POST['minimum_qty'])){
	$minimum_qty = $_POST['minimum_qty'];	
}else{
	$minimum_qty = 1;
}
if(isset($_POST['sisi'])){
	$sisi = $_POST['sisi'];	
}else{
	$sisi = 0;
}
if(isset($_POST['sisi_finishing'])){
	$sisi_finishing = $_POST['sisi_finishing'];	
}else{
	$sisi_finishing = 0;
}


mysqli_query($config,"INSERT INTO harga_jual VALUES ('','$produk','$bahan','$mesin','$finishing','$potong','$ukuran','$display','$harga','$minimum_qty','$sisi','$sisi_finishing')");
header("location:harga_jual.php?alert=data-add");