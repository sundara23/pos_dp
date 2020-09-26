<?php 
include '../config.php';
$produk = $_POST['produk'];
if($produk==1){
	$bahan = $_POST['bahan'];
	$mesin = $_POST['mesin'];
	$sisi = $_POST['sisi'];
	$finishing = $_POST['finishing'];
	$sisi_finishing = $_POST['sisi_finishing'];


	$cek = mysqli_query($config,"select * from harga_jual where hj_produk='$produk' and hj_mesin='$mesin' and hj_finishing='$finishing' and hj_bahan='$bahan' and hj_sisi='$sisi' and hj_sisi_finishing='$sisi_finishing'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['hj_harga'];	
	}else{
		echo "belum";
	}
}else if($produk==2){
	$bahan = $_POST['bahan'];
	$mesin = $_POST['mesin'];
	$sisi = $_POST['sisi'];
	$ukuran = $_POST['ukuran'];	

	$cek = mysqli_query($config,"select * from harga_jual where hj_produk='$produk' and hj_mesin='$mesin' and hj_bahan='$bahan' and hj_sisi='$sisi' and hj_ukuran='$ukuran'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['hj_harga'];	
	}else{
		echo "belum";
	}
}else if($produk==3){
	$bahan = $_POST['bahan'];
	$mesin = $_POST['mesin'];
	$finishing = $_POST['finishing'];
	$display = $_POST['display'];	

	$cek = mysqli_query($config,"select * from harga_jual where hj_produk='$produk' and hj_mesin='$mesin' and hj_bahan='$bahan' and hj_finishing='$finishing' and hj_display='$display'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['hj_harga'];	
	}else{
		echo "belum";
	}
}else if($produk==4){
	$bahan = $_POST['bahan'];
	$mesin = $_POST['mesin'];
	$sisi = $_POST['sisi'];
	$finishing = $_POST['finishing'];	
	$sisi_finishing = $_POST['sisi_finishing'];	
	$display = $_POST['display'];	
	$potong = $_POST['potong'];	

	$cek = mysqli_query($config,"select * from harga_jual where hj_produk='$produk' and hj_mesin='$mesin' and hj_bahan='$bahan' and hj_sisi='$sisi' and hj_finishing='$finishing' and hj_sisi_finishing='$sisi_finishing' and hj_display='$display' and hj_potong='$potong'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['hj_harga'];	
	}else{
		echo "belum";
	}
}else if($produk==5){
	$bahan = $_POST['bahan'];
	$mesin = $_POST['mesin'];	
	$finishing = $_POST['finishing'];		
	$potong = $_POST['potong'];	

	$cek = mysqli_query($config,"select * from harga_jual where hj_produk='$produk' and hj_mesin='$mesin' and hj_bahan='$bahan' and hj_finishing='$finishing' and hj_potong='$potong'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['hj_harga'];	
	}else{
		echo "belum";
	}
}

?>