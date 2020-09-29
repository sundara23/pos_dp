<?php 
include '../config.php';

	$bahan = $_POST['bahan'];

	$cek = mysqli_query($config,"select * from barang where bahan_id ='$bahan'");
	if(mysqli_num_rows($cek) > 0){
		$c = mysqli_fetch_assoc($cek);
		echo $c['bahan_jual'];	
	}else{
		echo "belum";
	}

?>