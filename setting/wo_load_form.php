<?php 
include '../config.php';

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