<?php include 'header2.php'; ?>
<!-- Main content -->
<style type="text/css">

.xxx tr th,
.xxx tr td{
	padding: 10px;
}
</style>
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<h4>Form Kostumer Baru</h4>
								<br>
								<div class="table-responsive">
									<form class="form-kostumer">
										<table class="table table-bordered table-hover table-striped">										
											<tr>																		
												<th>Nama</th>		
												<td>
													<input type="text" name="nama" class="form-control form-nama">
												</td>
											</tr>	
											<tr>																		
												<th>No. Telp</th>		
												<td>
													<input type="number" name="telp" class="form-control form-telp">
												</td>
											</tr>	
											<tr>																		
												<th>Alamat</th>		
												<td>
													<textarea class="form-control form-alamat" name="alamat" style="resize: none;"></textarea>
												</td>
											</tr>	
											<tr>																		
												<th>Email</th>		
												<td>
													<input type="text" name="email" class="form-control form-email">
													<input type="hidden" name="email" class="form-control form-toko" value="<?php echo $_SESSION['kd_toko']; ?>">
												</td>
											</tr>	
											<tr>																		
												<th></th>		
												<td>
													<input type="reset" value="Batal" class="btn btn-sm btn-danger">
													<a class="btn btn-sm btn-primary btn-simpan-kostumer">Simpan</a>
												</td>
											</tr>																		
										</table>
									</form>
								</div>

							</div>
							<div class="col-md-8">
								<h4>Form Tambah Order</h4>
								<br>
								<div style="background: #f0f0f0;padding: 10px;">
									<div class="row">
										<div class="col-md-5">
											<a class="pilih-kostumer btn btn-primary btn-sm"><i class="icon-user"></i> Pilih Kostumer</a>
											<br/>
											<br/>
											
											<table class="xxx">
												<tr>
													<th>Kostumer</th>
													<th>:</th>
													<td></td>
												</tr>
												<tr>
													<th>Alamat</th>
													<th>:</th>
													<td></td>
												</tr>
												<tr>
													<th>Email</th>
													<th>:</th>
													<td></td>
												</tr>
												<tr>
													<th>No.Telp</th>
													<th>:</th>
													<td></td>
												</tr>
											</table>
											<br>
										</div>
										<div class="col-md-7">										
											
											<form action="wo_add_act.php" method="post">
												<input type="hidden" class="kostumer-terpilih" name="kostumer">
												<input type="hidden" class="id_hj" name="id_hj">
												<input type="hidden" class="harga_satuan" name="harga_satuan">
												<input type="hidden" class="sub_total" name="sub_total">
												<input type="hidden" class="kd_toko" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
												<input type="hidden" class="id_admin" name="id_admin" value="<?php echo $_SESSION['id'];?>">
												<div class="table-responsive">
													<table class="table table-bordered">
														<tr class="">
															<th width="30%">Pilih Produk</th>
															<td>										
																<select class="pilih-produk form-control" name="produk" id="produk">
																	<option value="">Pilih -</option>
																	<?php 
																	$produk = mysqli_query($config,"select * from produk");		
																	while($p=mysqli_fetch_array($produk)){
																		?>										
																		<option value="<?php echo $p['produk_id']; ?>"><?php echo $p['produk_nama']; ?></option>
																		<?php 
																	}
																	?>
																</select>
															</td>
														</tr>																												
													</table>
												</div>


												<br/>												
												<br/>

												<div class="tampil-form"></div>

												<br/>
												<br/>
												<br/>

											</form>

										</div>
									</div>

								</div>
							</div>

						</div>

					</div>					
				</div>	


				<div class="alert alert-success text-center">
					Silahkan Masukkan Pesanan.
				</div>


			</div>	


		</div>

	</div>		


	<div class="footer text-muted">

	</div>

</div>
<div class="modal fade modal-kostumer " role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h5 class="modal-title">Pilih Kostumer</h5>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped table-datatable">						
						<thead>
							<tr>
								<th width="1%">No</th>									
								<th>Nama</th>																					
								<th>No.Telp</th>																					
								<th>Email</th>																					
								<th>Alamat</th>																					
								<th width="1%">OPSI</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1; 
							$data = mysqli_query($config,"select * from kostumer order by kostumer_id desc");		
							while($d=mysqli_fetch_array($data)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['kostumer_nama'] ?></td>
									<td><?php echo $d['kostumer_telp'] ?></td>
									<td><?php echo $d['kostumer_email'] ?></td>
									<td><?php echo $d['kostumer_alamat'] ?></td>																						
									<td>																					
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs tentukan-kostumer" data-dismiss="modal" id="<?php echo $d['kostumer_id'];?>">Pilih</a>										
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('body').on("click",".pilih-kostumer",function(){
			$('.modal-kostumer').modal();
		});

		$('body').on("click",".btn-simpan-kostumer",function(){
			// $('.modal-kostumer').modal();
			var nama = $(".form-nama").val();
			var telp = $(".form-telp").val();
			var alamat = $(".form-alamat").val();
			var email = $(".form-email").val();
			var kd_toko = $(".form-toko").val();

			if(nama!=""&&telp!=""&&alamat!=""&&email!=""){
				var data = "nama="+nama+"&telp="+telp+"&alamat="+alamat+"&email="+email+"&kd_toko="+kd_toko;
				$.ajax({
					data : data,
					url : 'wo_tambah_ajax.php',
					method : "POST",
					success:function(html){				
						$(".kostumer-terpilih").val(html);
						var url = "wo_tambah_ajax2.php?id="+html;
						$(".xxx").load(url);						
					}
				});
			}else{
				alert("Isi data dengan lengkap.");
			}
		});


		$('body').on("click",".tentukan-kostumer",function(){			
			var id = $(this).attr('id');

			$(".kostumer-terpilih").val(id);
			var url = "wo_tambah_ajax2.php?id="+id;
			$(".xxx").load(url);

		});



		$("body").on("change", ".pilih-produk", function(){

			var produk = $(this).val();			
			var site_url = 'wo_load_form.php?id=' + produk;
			$(".tampil-form").load(site_url);			
			
		});



		$("body").on("click", ".btnhitung", function(){
			
			// kartu nama
			// alert('asd');
			var produk = $("#produk").val();			
			if(produk==1){
			
				var jumlah = $("#jumlah").val();							
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var sisi = $("#sisi").val();
				var id_finishing = $("#id_finishing").val();
				var sisi_finishing = $("#sisi_finishing").val();

				
				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_potong!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&sisi="+sisi+"&sisi_finishing="+sisi_finishing;
					$.ajax({
						data : data,
						url : 'wo_hitung_harga.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");	
								$(".btn-submit").removeClass("tampil");																	
							}else{								
								var c = html*jumlah;
							
								var total = c;
								$("#tots").html("RM."+c);	
								$(".harga_satuan").val(html);
								$(".sub_total").val(c);
								$(".btn-submit").addClass("tampil");													
							}
						}
					});

					$.ajax({
						data : data,
						url : 'wo_get_id.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$(".id_hj").val('');																							
							}else{	
								$(".id_hj").val(html);																																			
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}







			}else if(produk==2){
				var jumlah = $("#jumlah").val();
				var id_mesin = $("#id_mesin").val();
				var ukuran = $("#ukuran").val();				
				var id_bahan = $("#id_bahan").val();
				var sisi = $("#sisi").val();							
				
				
				if(id_mesin!=""&&id_bahan!=""&&ukuran!=""&&sisi!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&ukuran="+id_ukuran+"&produk="+produk+"&sisi="+sisi;
					$.ajax({
						data : data,
						url : 'wo_hitung_harga.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");	
								$(".btn-submit").removeClass("tampil");																	
							}else{								
								var c = html*jumlah;
							
								var total = c;
								$("#tots").html("RM."+c);	
								$(".harga_satuan").val(html);
								$(".sub_total").val(c);
								$(".btn-submit").addClass("tampil");													
							}
						}
					});

					$.ajax({
						data : data,
						url : 'wo_get_id.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$(".id_hj").val('');																							
							}else{	
								$(".id_hj").val(html);																																			
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}



			}else if(produk==3){
				var jumlah = $("#jumlah").val();
				var id_display = $("#id_display").val();
				var panjang = $("#panjang").val();				
				var lebar = $("#lebar").val();					
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var id_finishing = $("#id_finishing").val();				
				
				
				if(id_mesin!=""&&id_bahan!=""&&jumlah!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&display="+id_display;
					$.ajax({
						data : data,
						url : 'wo_hitung_harga.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");	
								$(".btn-submit").removeClass("tampil");																	
							}else{								
								var c = html*jumlah;
							
								var total = c;
								$("#tots").html("RM."+c);	
								$(".harga_satuan").val(html);
								$(".sub_total").val(c);
								$(".btn-submit").addClass("tampil");													
							}
						}
					});

					$.ajax({
						data : data,
						url : 'wo_get_id.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$(".id_hj").val('');																							
							}else{	
								$(".id_hj").val(html);																																			
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}




			}else if(produk==4){			
				var jumlah = $("#jumlah").val();							
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var sisi = $("#sisi").val();
				var id_finishing = $("#id_finishing").val();
				var sisi_finishing = $("#sisi_finishing").val();
				var id_potong = $("#id_potong").val();				


				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_potong!=""&&jumlah!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&sisi="+sisi+"&sisi_finishing="+sisi_finishing+"&potong="+id_potong;
					$.ajax({
						data : data,
						url : 'wo_hitung_harga.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");	
								$(".btn-submit").removeClass("tampil");																	
							}else{								
								var c = html*jumlah;
							
								var total = c;
								$("#tots").html("RM."+c);	
								$(".harga_satuan").val(html);
								$(".sub_total").val(c);
								$(".btn-submit").addClass("tampil");													
							}
						}
					});

					$.ajax({
						data : data,
						url : 'wo_get_id.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$(".id_hj").val('');																							
							}else{	
								$(".id_hj").val(html);																																			
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}


			}else if(produk==5){
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();				
				var id_finishing = $("#id_finishing").val();											
				var id_potong = $("#id_potong").val();				
				var panjang = $("#panjang").val();				
				var lebar = $("#lebar").val();				
				var jumlah = $("#jumlah").val();				
				
				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_potong!=""&&hargajual!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&display="+id_display+"&potong="+id_potong;
					$.ajax({
						data : data,
						url : 'wo_hitung_harga.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");	
								$(".btn-submit").removeClass("tampil");																	
							}else{	
								var a = html*panjang;
								var b = a*lebar;
								var c = b*jumlah;
							

								// var total = c;
								$("#tots").html("RM."+c);	
								$(".harga_satuan").val(html);
								$(".sub_total").val(c);
								$(".btn-submit").addClass("tampil");						
							}
						}
					});

					$.ajax({
						data : data,
						url : 'wo_get_id.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$(".id_hj").val('');																							
							}else{	
								$(".id_hj").val(html);																																			
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}
			}
		});

	$('body').on("click",".btn-submit",function(e){	
		var kostumer = $(".kostumer-terpilih").val();
		if(kostumer == ""){
			e.preventDefault();		
			alert("data kostumer belum di pilih");
		}
		// else{
		// 	e.preventDefault();	
		// 	var produk = $("#produk").val();
		// 	var id_mesin = $("#id_mesin").val();
		// 	var id_bahan = $("#id_bahan").val();				
		// 	var id_finishing = $("#id_finishing").val();											
		// 	var id_potong = $("#id_potong").val();				
		// 	var panjang = $("#panjang").val();				
		// 	var lebar = $("#lebar").val();				
		// 	var jumlah = $("#jumlah").val();	
		// 	alert(produk);	
		// 	var order_table = "<tr></tr>";
		// }	

	});

});
</script>

<?php include 'footer.php'; ?>