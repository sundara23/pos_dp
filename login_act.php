<?php 
include 'config.php';
$username = $_POST['username'];
$password = sha1($_POST['password']);

$cek = mysqli_query($config,"select * from admin inner join user_level on admin.level=user_level.kd_level inner join toko on admin.kd_toko=toko.kd_toko where username='$username' and password='$password'");


if(mysqli_num_rows($cek) > 0){
	session_start();

	$c = mysqli_fetch_assoc($cek);

	$_SESSION['id'] = $c['id'];
	$_SESSION['username'] = $c['username'];
	$_SESSION['nama'] = $c['nama'];
	$_SESSION['level'] = $c['level'];
	$_SESSION['level_name'] = $c['level_name'];
	$_SESSION['nama_toko'] = $c['nama_toko'];
	$_SESSION['ket_toko'] = $c['ket_toko'];
	$_SESSION['kd_toko'] = $c['kd_toko'];
	$_SESSION['status'] = "login";
	
	if($c['level']=="bm"){		
		header("location:bm/");
	}else if($c['level']=="owner"){		
		header("location:owner/");
	}else if($c['level']=="kasir"){		
		header("location:kasir/");
	}else if($c['level']=="setting"){		
		header("location:setting/");
	}else if($c['level']=="produksi"){		
		header("location:produksi/");
	}
}else{
	header("location:index.php?alert=gagal");
}


?>