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
						<h4 class="panel-title">Tambah Level Harga</h4>
						<div class="heading-elements">
							<a href="level_harga.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="level_harga_add_act.php" method="post">
								<table class="table table-bordered">
                                    <tr>
                                        <th width="20%" >Pilih Produk</th>
                                        <td>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <select id="produk" name="produk_jual" class="form-control" required="required">
                                                        <option value="">-Pilih-</option>
                                                        <?php
                                                        $data = mysqli_query($config,"select * from produk_atk");
                                                        while($d=mysqli_fetch_array($data)){
                                                            ?>
                                                            <option value="<?php echo $d['kd_produk']?>"><?php echo $d['nama_produk']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
									<tr>
                                        <th width="20%">Nama Level</th>
                                        <td><input type="text" class="form-control" name="nama_level" required="required"></td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Harga Jual Level</th>
                                        <td><input type="number" class="form-control" name="harga_level" required="required"></td>
                                    </tr>
									<tr>
										<th></th>
										<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
									</tr>		
								</table>
							</form>
						</div>					
					</div>					
				</div>	


			</div>

		</div>		
	
		<div class="footer text-muted">
			
		</div>

	</div>
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#produk').select2({
                placeholder: 'Pilih Produk',
                allowClear: true
            });
            $('#satuan').select2({
                placeholder: 'Pilih Satuan',
                allowClear: true
            });
        });
    </script>

<?php include 'footer.php'; ?>