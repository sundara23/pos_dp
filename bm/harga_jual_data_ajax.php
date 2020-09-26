<?php 
include '../config.php';
$id = $_GET['id'];
$data = $_GET['data'];

if($data == "mesin"){
	
	$data = mysqli_query($config,"select * from mesin where mesin_id='$id'");
	$d = mysqli_fetch_assoc($data);
	return $d['mesin_hpp'];

}else if($data == "bahan"){

	$data = mysqli_query($config,"select * from bahan where bahan_id='$id'");
	$d = mysqli_fetch_assoc($data);
	return $d['bahan_hpp'];

}else if($data == "jenis_finishing"){

	$data = mysqli_query($config,"select * from jenis_finishing where jenis_finishing_id='$id'");
	$d = mysqli_fetch_assoc($data);
	return $d['jenis_finishing_hpp'];

}
?>