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
						<h4 class="panel-title">Edit Password</h4>
						<div class="heading-elements">
							<a href="admin.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="admin_password_update.php" method="post">
								<?php
								$id = $_GET['id'];
								$data = mysqli_query($config,"select * from admin where id='$id'");		
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table table-bordered">										
										<tr>
											<th width="20%">Password Baru</th>
											<td>
												<input type="hidden" class="form-control" name="id" required="required" value="<?php echo $d['id']; ?>">
												<input type="text" class="form-control" name="password" required="required">
											</td>
										</tr>																										
										<tr>
											<th></th>
											<td><input type="submit" value="Simpan" class="btn btn-primary btn-sm"></td>
										</tr>		
									</table>

									<?php } ?>
								</form>
							</div>					
						</div>					
					</div>	


				</div>

			</div>		


		</div>
	</div>

	<?php include 'footer.php'; ?>