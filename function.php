<?php 
function show_alert(){
	if(isset($_GET['alert'])){
		if($_GET['alert'] == "data-add"){
			echo "<div class='alert alert-success'>Data Berhasil Di Tambah</div>";
		}else if($_GET['alert'] == "data-update"){
			echo "<div class='alert alert-success'>Data Berhasil Di Update</div>";
		}else if($_GET['alert'] == "data-hapus"){
			echo "<div class='alert alert-success'>Data Berhasil Di Hapus</div>";
		}else if($_GET['alert'] == "data-batal"){
            echo "<div class='alert alert-success'>Data Berhasil Di Batalkan</div>";
        }else if($_GET['alert'] == "data-gagal"){
            echo "<div class='alert alert-danger'>Data Gagal Ditambahkan</div>";
        }else if($_GET['alert'] == "data-gagalhapus"){
            echo "<div class='alert alert-danger'>Data Gagal Dihapus</div>";
        }else if($_GET['alert'] == "data-alihkan"){
            echo "<div class='alert alert-success'>Data Berhasil Dialihkan</div>";
        }else if($_GET['alert'] == "data-gagalalihkan"){
            echo "<div class='alert alert-danger'>Data Gagal Dialihkan</div>";
        }else if($_GET['alert'] == "data-gagalupdate"){
            echo "<div class='alert alert-danger'>Data Gagal Diupdate</div>";
        }else if($_GET['alert'] == "data-sudahada"){
            echo "<div class='alert alert-danger'>Produk Sudah Ada</div>";
        }else if($_GET['alert'] == "data-kesalahansistem"){
            echo "<div class='alert alert-danger'>Ada Kesalahan Sistem Silahkan Coba Lagi</div>";
        }
	}

}
?>