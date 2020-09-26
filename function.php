<?php 
function show_alert(){
	if(isset($_GET['alert'])){
		if($_GET['alert'] == "data-add"){
			echo "<div class='alert alert-success'>Data Berhasil Di Tambah</div>";
		}else if($_GET['alert'] == "data-update"){
			echo "<div class='alert alert-success'>Data Berhasil Di Update</div>";
		}else if($_GET['alert'] == "data-hapus"){
			echo "<div class='alert alert-success'>Data Berhasil Di Hapus</div>";
		}
	}

}
?>