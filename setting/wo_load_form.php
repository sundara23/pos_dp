<?php 
include '../config.php';
$id = $_GET['id'];

if($id == 1){
	?>
	<div id="load_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%">Jumlah</th>
					<td>
						<input required="required" name="jumlah" id="jumlah" class="form-control" min="0" type="number">
					</td>
				</tr>
				<tr>
					<th width="20%">Mesin</th>
					<td>
						<select name="id_mesin" id="id_mesin" class="form-control" required="">
							<option value=""> Pilih Mesin </option>
							<?php 
							$mesin = mysqli_query($config,"select * from mesin");
							while($m=mysqli_fetch_array($mesin)){
								?>
								<option value="<?php echo $m['mesin_id']; ?>"><?php echo $m['mesin_nama']; ?> - <?php echo $m['mesin_tipe']; ?></option>
								<?php 
							}
							?>							
						</select>
					</td>
				</tr>
				<tr>
					<th>Bahan</th>
					<td>
						<select name="id_bahan" id="id_bahan" class="form-control" required="">
							<option value=""> Pilih Bahan </option>
							<?php 
							$bahan = mysqli_query($config,"select * from bahan");
							while($b=mysqli_fetch_array($bahan)){
								?>
								<option value="<?php echo $b['bahan_id']; ?>"><?php echo $b['bahan_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>
				<tr>
					<th>Sisi</th>
					<td>
						<select name="sisi" id="sisi" class="form-control">
							<option value="1">1 Sisi</option>
							<option value="2">2 Sisi</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Laminating</th>
					<td>
						<select name="id_finishing" id="id_finishing" class="form-control">							
							<?php 
							$jenis_finishing = mysqli_query($config,"select * from jenis_finishing");
							while($jf=mysqli_fetch_array($jenis_finishing)){
								?>
								<option value="<?php echo $jf['jenis_finishing_id']; ?>"><?php echo $jf['jenis_finishing_nama']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Sisi Laminating</th>
					<td>
						<select name="sisi_finishing" id="sisi_finishing" class="form-control">
							<option value="0">0 Sisi</option>
							<option value="1">1 Sisi</option>
							<option value="2">2 Sisi</option>
						</select>
					</td>
				</tr>				
				<tr>
					<th></th>
					<td>
						<div class="col-md-6">
							<button class="btn btn-success btnhitung btn-sm" type="button">Hitung</button>	
						</div>
						<div class="col-md-6">
							<div class="col-md-12 btn btn-default btn-sm" id="tots">----</div>
						</div>						
					</td>
				</tr>
				<tr>
					<th></th>
					<td>						
						<input class="btn btn-primary btn-block sembunyi btn-submit" type="submit" value="Tambahkan Pesanan">						
					</td>
				</tr>
			</table>
		</div>


	</div>

	<?php
}else if($id == 2){
	?>
	<div id="load_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%">Jumlah</th>
					<td>
						<input required="required" name="jumlah" id="jumlah" class="form-control" min="0" type="number">
					</td>
				</tr>
				<tr>
					<th width="20%">Mesin</th>
					<td>
						<select name="id_mesin" id="id_mesin" class="form-control" required="">
							<option value=""> Pilih Mesin</option>
							<?php 
							$mesin = mysqli_query($config,"select * from mesin");
							while($m=mysqli_fetch_array($mesin)){
								?>
								<option value="<?php echo $m['mesin_id']; ?>"><?php echo $m['mesin_nama']; ?> - <?php echo $m['mesin_tipe']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Ukuran</th>
					<td>
						<select name="ukuran" id="ukuran" class="form-control" required="">
							<option value="">Pilih Ukuran</option>
							<option value="A4">A4</option>
							<option value="A5">A5</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Bahan</th>
					<td>
						<select name="id_bahan" id="id_bahan" class="form-control" required="">
							<option value=""> Pilih Bahan </option>
							<?php 
							$bahan = mysqli_query($config,"select * from bahan");
							while($b=mysqli_fetch_array($bahan)){
								?>
								<option value="<?php echo $b['bahan_id']; ?>"><?php echo $b['bahan_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>				
				<tr>
					<th>Sisi</th>
					<td>
						<select name="sisi" id="sisi" class="form-control">
							<option value="1">1 Sisi</option>
							<option value="2">2 Sisi</option>
						</select>
					</td>
				</tr>				
				<tr>
					<th></th>
					<td>
						<div class="col-md-6">
							<button class="btn btn-success btnhitung btn-sm" type="button">Hitung</button>	
						</div>
						<div class="col-md-6">
							<div class="col-md-12 btn btn-default btn-sm" id="tots">----</div>
						</div>						
					</td>
				</tr>
				<tr>
					<th></th>
					<td>						
						<input class="btn btn-primary btn-block sembunyi btn-submit" type="submit" value="Tambahkan Pesanan">						
					</td>
				</tr>
			</table>
		</div>
						
	</div>

	<?php
}else if($id == 3){
	?>
	<div id="load_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%">Jumlah</th>
					<td>
						<input required="required" name="jumlah" id="jumlah" class="form-control" min="0" type="number">
					</td>
				</tr>
				<tr>
					<th width="20%">Kaki</th>
					<td>
						<select name="id_display" id="id_display" class="form-control" required="">
							<option value=""> Pilih  Display</option>
							<?php 
							$jenis_display = mysqli_query($config,"select * from jenis_display");
							while($jd=mysqli_fetch_array($jenis_display)){
								?>
								<option value="<?php echo $jd['jenis_display_id']; ?>"><?php echo $jd['jenis_display_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>	
				<tr>
					<th>Panjang (meter)</th>
					<td>
						<input required="required" name="panjang" id="panjang" class="form-control" min="0" value="1" type="number">
					</td>
				</tr>
				<tr>
					<th>Lebar (meter)</th>
					<td>
						<input required="required" name="lebar" id="lebar" class="form-control" min="0" value="1" type="number">
					</td>
				</tr>				
				<tr>
					<th>Bahan</th>
					<td>
						<select name="id_bahan" id="id_bahan" class="form-control" required="">
							<option value=""> Pilih Bahan </option>
							<?php 
							$bahan = mysqli_query($config,"select * from bahan");
							while($b=mysqli_fetch_array($bahan)){
								?>
								<option value="<?php echo $b['bahan_id']; ?>"><?php echo $b['bahan_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>				
				<tr>
					<th>Mesin</th>
					<td>
						<select name="id_mesin" id="id_mesin" class="form-control" required="">
							<option value=""> Pilih Mesin</option>
							<?php 
							$mesin = mysqli_query($config,"select * from mesin");
							while($m=mysqli_fetch_array($mesin)){
								?>
								<option value="<?php echo $m['mesin_id']; ?>"><?php echo $m['mesin_nama']; ?> - <?php echo $m['mesin_tipe']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Laminating</th>
					<td>
						<select name="id_finishing" id="id_finishing" class="form-control">							
							<?php 
							$jenis_finishing = mysqli_query($config,"select * from jenis_finishing");
							while($jf=mysqli_fetch_array($jenis_finishing)){
								?>
								<option value="<?php echo $jf['jenis_finishing_id']; ?>"><?php echo $jf['jenis_finishing_nama']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>					
				<tr>
					<th></th>
					<td>
						<div class="col-md-6">
							<button class="btn btn-success btnhitung btn-sm" type="button">Hitung</button>	
						</div>
						<div class="col-md-6">
							<div class="col-md-12 btn btn-default btn-sm" id="tots">----</div>
						</div>						
					</td>
				</tr>
				<tr>
					<th></th>
					<td>						
						<input class="btn btn-primary btn-block sembunyi btn-submit" type="submit" value="Tambahkan Pesanan">						
					</td>
				</tr>
			</table>
		</div>
		


				
	</div>

	<?php
}else if($id == 4){
	?>
	<div id="load_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%">Jumlah</th>
					<td>
						<input required="required" name="jumlah" id="jumlah" class="form-control" min="0" type="number">
					</td>
				</tr>
				<tr>
					<th width="20%">Mesin</th>
					<td>
						<select name="id_mesin" id="id_mesin" class="form-control" required="">
							<option value=""> Pilih Mesin</option>
							<?php 
							$mesin = mysqli_query($config,"select * from mesin");
							while($m=mysqli_fetch_array($mesin)){
								?>
								<option value="<?php echo $m['mesin_id']; ?>"><?php echo $m['mesin_nama']; ?> - <?php echo $m['mesin_tipe']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Bahan</th>
					<td>
						<select name="id_bahan" id="id_bahan" class="form-control" required="">
							<option value=""> Pilih Bahan </option>
							<?php 
							$bahan = mysqli_query($config,"select * from bahan");
							while($b=mysqli_fetch_array($bahan)){
								?>
								<option value="<?php echo $b['bahan_id']; ?>"><?php echo $b['bahan_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>
				<tr>
					<th>Sisi</th>
					<td>
						<select name="sisi" id="sisi" class="form-control">
							<option value="1">1 Sisi</option>
							<option value="2">2 Sisi</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Laminating</th>
					<td>
						<select name="id_finishing" id="id_finishing" class="form-control">							
							<?php 
							$jenis_finishing = mysqli_query($config,"select * from jenis_finishing");
							while($jf=mysqli_fetch_array($jenis_finishing)){
								?>
								<option value="<?php echo $jf['jenis_finishing_id']; ?>"><?php echo $jf['jenis_finishing_nama']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Sisi Laminating</th>
					<td>
						<select name="sisi_finishing" id="sisi_finishing" class="form-control">
							<option value="0">0 Sisi</option>
							<option value="1">1 Sisi</option>
							<option value="2">2 Sisi</option>
						</select>
					</td>
				</tr>
				<tr>
					<th>Cutting</th>
					<td>
						<select name="id_potong" id="id_potong" class="form-control">							
							<?php 
							$jenis_potong = mysqli_query($config,"select * from jenis_potong");
							while($jp=mysqli_fetch_array($jenis_potong)){
								?>
								<option value="<?php echo $jp['jenis_potong_id']; ?>"><?php echo $jp['jenis_potong_nama']; ?></option>
								<?php 
							}
							?>
						</select>
					</td>
				</tr>				
				<tr>
					<th></th>
					<td>
						<div class="col-md-6">
							<button class="btn btn-success btnhitung btn-sm" type="button">Hitung</button>	
						</div>
						<div class="col-md-6">
							<div class="col-md-12 btn btn-default btn-sm" id="tots">----</div>
						</div>						
					</td>
				</tr>
				<tr>
					<th></th>
					<td>						
						<input class="btn btn-primary btn-block sembunyi btn-submit" type="submit" value="Tambahkan Pesanan">						
					</td>
				</tr>
			</table>
		</div>					

	</div>

	<?php
}else if($id == 5){
	?>
	<div id="load_form">
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="30%">Jumlah</th>
					<td>
						<input required="required" name="jumlah" id="jumlah" class="form-control" min="0" type="number">
					</td>
				</tr>
				<tr>
					<th>Panjang (meter)</th>
					<td>
						<input required="required" name="panjang" id="panjang" class="form-control" min="0" value="1" type="number">
					</td>
				</tr>
				<tr>
					<th>Lebar (meter)</th>
					<td>
						<input required="required" name="lebar" id="lebar" class="form-control" min="0" value="1" type="number">
					</td>
				</tr>				
				<tr>
					<th width="20%">Mesin</th>
					<td>
						<select name="id_mesin" id="id_mesin" class="form-control" required="">
							<option value=""> Pilih Mesin</option>
							<?php 
							$mesin = mysqli_query($config,"select * from mesin");
							while($m=mysqli_fetch_array($mesin)){
								?>
								<option value="<?php echo $m['mesin_id']; ?>"><?php echo $m['mesin_nama']; ?> - <?php echo $m['mesin_tipe']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Bahan</th>
					<td>
						<select name="id_bahan" id="id_bahan" class="form-control" required="">
							<option value=""> Pilih Bahan </option>
							<?php 
							$bahan = mysqli_query($config,"select * from bahan");
							while($b=mysqli_fetch_array($bahan)){
								?>
								<option value="<?php echo $b['bahan_id']; ?>"><?php echo $b['bahan_nama']; ?></option>
								<?php 
							}
							?>		
						</select>
					</td>
				</tr>
				<tr>
					<th>Laminating</th>
					<td>
						<select name="id_finishing" id="id_finishing" class="form-control">							
							<?php 
							$jenis_finishing = mysqli_query($config,"select * from jenis_finishing");
							while($jf=mysqli_fetch_array($jenis_finishing)){
								?>
								<option value="<?php echo $jf['jenis_finishing_id']; ?>"><?php echo $jf['jenis_finishing_nama']; ?></option>
								<?php 
							}
							?>	
						</select>
					</td>
				</tr>
				<tr>
					<th>Cutting</th>
					<td>
						<select name="id_potong" id="id_potong" class="form-control">							
							<?php 
							$jenis_potong = mysqli_query($config,"select * from jenis_potong");
							while($jp=mysqli_fetch_array($jenis_potong)){
								?>
								<option value="<?php echo $jp['jenis_potong_id']; ?>"><?php echo $jp['jenis_potong_nama']; ?></option>
								<?php 
							}
							?>
						</select>
					</td>
				</tr>	
				<tr>
					<th>Finishing</th>
					<td>
						<select name="id_finishing" id="id_finishing" class="form-control">							
							<?php 
							$jenis_finishing = mysqli_query($config,"select * from jenis_finishing");
							while($jf=mysqli_fetch_array($jenis_finishing)){
								?>
								<option value="<?php echo $jf['jenis_finishing_id']; ?>"><?php echo $jf['jenis_finishing_nama']; ?></option>
								<?php 
							}
							?>
						</select>
					</td>
				</tr>			
				<tr>
					<th></th>
					<td>
						<div class="col-md-6">
							<button class="btn btn-success btnhitung btn-sm" type="button">Hitung</button>	
						</div>
						<div class="col-md-6">
							<div class="col-md-12 btn btn-default btn-sm" id="tots">----</div>
						</div>						
					</td>
				</tr>
				<tr>
					<th></th>
					<td>						
						<input class="btn btn-primary btn-block sembunyi btn-submit" type="submit" value="Tambahkan Pesanan">						
					</td>
				</tr>
			</table>
		</div>
	
	</div>

	<?php 
}
?>