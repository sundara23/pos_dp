<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Harga Jual</h4>
						<div class="heading-elements">
							<a href="harga_jual.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<form action="harga_jual_add_act.php" method="post">
							<div class="table-responsive">
								<table class="table table-bordered">
									<tr class="bg-indigo">
										<th width="20%">Pilih Produk</th>
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

		<div class="footer text-muted">

		</div>

	</div>
</div>

<script type="text/javascript">
	$('document').ready(function(){
		$("body").on("change", ".pilih-produk", function(){

			var produk = $(this).val();			
			var site_url = 'harga_jual_load_form.php?id=' + produk;
			$(".tampil-form").load(site_url);			
			
		});


		$("body").on("click", ".btnhitung", function(){
			
			// kartu nama
			// alert('asd');
			var produk = $("#produk").val();			
			if(produk==1){
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var sisi = $("#sisi").val();
				var id_finishing = $("#id_finishing").val();
				var sisi_finishing = $("#sisi_finishing").val();
				var hargajual = $("#hargajual").val();
				var minimum_qty = $("#minimum_qty").val();

				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&sisi_finishing!=""&&hargajual!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&sisi="+sisi+"&sisi_finishing="+sisi_finishing;
					$.ajax({
						data : data,
						url : 'harga_jual_cek.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");						
								$(".btn-submit").addClass("tampil");						
							}else{
								$("#tots").html("RM."+html+" ( Harga sudah ada. )");						
							}
						}
					});

				}else{
					alert("data harus di isi dengan lengkap.");
				}

			}else if(produk==2){
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var ukuran = $("#ukuran").val();				
				var sisi = $("#sisi").val();				
				var hargajual = $("#hargajual").val();
				var minimum_qty = $("#minimum_qty").val();

				if(id_mesin!=""&&id_bahan!=""&&ukuran!=""&&hargajual!=""){

					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&ukuran="+ukuran+"&produk="+produk+"&sisi="+sisi;
					$.ajax({
						data : data,
						url : 'harga_jual_cek.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");						
								$(".btn-submit").addClass("tampil");						
							}else{
								$("#tots").html("RM."+html+" ( Harga sudah ada. )");						
							}
						}
					});

				}else{
					alert("data harus di isi dengan lengkap.");
				}
			}else if(produk==3){
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var id_finishing = $("#id_finishing").val();				
				var id_display = $("#id_display").val();				
				var hargajual = $("#hargajual").val();
				var minimum_qty = $("#minimum_qty").val();

				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_display!=""&&hargajual!=""){

					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&display="+id_display;
					$.ajax({
						data : data,
						url : 'harga_jual_cek.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");						
								$(".btn-submit").addClass("tampil");						
							}else{
								$("#tots").html("RM."+html+" ( Harga sudah ada. )");						
							}
						}
					});

				}else{
					alert("data harus di isi dengan lengkap.");
				}

			}else if(produk==4){
				var id_mesin = $("#id_mesin").val();
				var id_bahan = $("#id_bahan").val();
				var sisi = $("#sisi").val();
				var id_finishing = $("#id_finishing").val();				
				var sisi_finishing = $("#sisi_finishing").val();				
				var id_display = $("#id_display").val();				
				var id_potong = $("#id_potong").val();				
				var hargajual = $("#hargajual").val();
				var minimum_qty = $("#minimum_qty").val();

				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_display!=""&&id_potong!=""&&hargajual!=""){

					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&display="+id_display+"&potong="+id_potong+"&sisi="+sisi+"&sisi_finishing="+sisi_finishing;
					$.ajax({
						data : data,
						url : 'harga_jual_cek.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");						
								$(".btn-submit").addClass("tampil");						
							}else{
								$("#tots").html("RM."+html+" ( Harga sudah ada. )");						
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
				var hargajual = $("#hargajual").val();
				var minimum_qty = $("#minimum_qty").val();

				if(id_mesin!=""&&id_bahan!=""&&id_finishing!=""&&id_potong!=""&&hargajual!=""){


					var data = "mesin="+id_mesin+"&bahan="+id_bahan+"&finishing="+id_finishing+"&produk="+produk+"&display="+id_display+"&potong="+id_potong;
					$.ajax({
						data : data,
						url : 'harga_jual_cek.php',
						method : "POST",
						success:function(html){				
							if(html=="belum"){						
								$("#tots").html("Harga tidak terdefinisi");						
								$(".btn-submit").addClass("tampil");						
							}else{
								$("#tots").html("RM."+html+" ( Harga sudah ada. )");						
							}
						}
					});
				}else{
					alert("data harus di isi dengan lengkap.");
				}
			}
			
			





			// if(id_mesin!=""&&id_bahan!=""&&sisi!=""&&id_finishing!=""&&sisi_finishing!=""&&hargajual!=""&&minimum_qty!=""){
			// 	// var hasil = parseInt(id_mesin)+parseInt(id_bahan);
			// 	// $("#hpp").val(hasil);
			// 	var hpp_mesin = 'harga_jual_data_ajax.php?data=mesin&id=' + id_mesin;
			// 	var hpp_bahan = 'harga_jual_data_ajax.php?data=bahan&id=' + id_bahan;
			// 	var hpp_finishing = 'harga_jual_data_ajax.php?data=finishing&id=' + id_finishing;

			// 	alert(hpp_mesin);
			// }else{
			// 	alert("Data harus di isi dengan lengkap!");
			// }

			
		});





	});
</script>

<?php include 'footer.php'; ?>