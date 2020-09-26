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
						<h4 class="panel-title">Data Admin</h4>
						<div class="heading-elements">
							<a href="admin_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH ADMIN</a>
							<!-- <a href="#" class="btn btn-sm bg-green">EXCEL<		/a> -->
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-bordered table-hover table-datatable">
							<thead>
								<tr>
									<th width="1%">No</th>									
									<th>Username</th>		
									<th>Nama</th>		
									<th>Handphone</th>		
									<th>Alamat</th>		
									<th>Level</th>
									<th>Toko</th>		
									<th width="22%">OPSI</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$no = 1; 
							$data = mysqli_query($config,"select * from admin inner join user_level on admin.level=user_level.kd_level inner join toko on admin.kd_toko=toko.kd_toko");
							while($d=mysqli_fetch_array($data)){
								?>
								<tr
								<?php 
								if($d['level']=="bm"){
									echo "class='alert alert-success'";
								}else if($d['level']=="produksi"){
									echo "class='alert alert-info'";
								}else if($d['level']=="owner"){
									echo "class='alert alert-default'";
								}else if($d['level']=="kasir"){
									echo "class='alert alert-warning'";
								}else if($d['level']=="setting"){
									echo "class='alert alert-danger'";
								}
								?>

								>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['username'] ?></td>
									<td><?php echo $d['nama'] ?></td>
									<td><?php echo $d['handphone'] ?></td>			
									<td><?php echo $d['alamat'] ?></td>			
									<td><?php echo $d['level_name'] ?></td>
									<td><?php echo $d['ket_toko'] ?></td>
									<td>									
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="admin_password.php?id=<?php echo $d['id'];?>"><i class="icon-lock"></i> Update Password</a>
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="admin_edit.php?id=<?php echo $d['id'];?>"><i class="icon-wrench3"></i></a>
										<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="admin_hapus.php?id=<?php echo $d['id'];?>"><i class="icon-trash-alt"></i></a>
									</td>
								</tr>
								<?php
							}
							?>
							</tbody>
						</table>
						</div>					
					</div>					
				</div>	


			</div>

		</div>		
	
		<div class="footer text-muted">
			<!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a> -->
		</div>

	</div>
</div>

<?php include 'footer.php'; ?>