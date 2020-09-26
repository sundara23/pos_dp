<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Bahan</h4>						
					</div>
					<div class="panel-body">
						<a href="bahan_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH BAHAN</a>
						<!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Nama Bahan</th>		
										<th>Kategori</th>		
										<th>HPP</th>												
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from bahan order by bahan_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['bahan_nama'] ?></td>
											<td><?php echo $d['bahan_kategori'] ?></td>			
											<td>Rp. <?php echo number_format($d['bahan_hpp']); ?></td>														
											<td>																					
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="bahan_edit.php?id=<?php echo $d['bahan_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="bahan_hapus.php?id=<?php echo $d['bahan_id'];?>"><i class="icon-trash-alt"></i></a>
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


		<div class="row">
			<div class="col-lg-6">
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Mesin</h4>						
					</div>
					<div class="panel-body">
						<a href="mesin_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH MESIN</a>
						<a href="#" class="btn btn-sm bg-green">EXCEL</a>
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Nama Mesin</th>		
										<th>Kategori</th>		
										<th>HPP</th>												
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from mesin order by mesin_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['mesin_nama'] ?></td>
											<td><?php echo $d['mesin_kategori'] ?></td>			
											<td>Rp. <?php echo number_format($d['mesin_hpp']); ?></td>														
											<td>																					
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="mesin_edit.php?id=<?php echo $d['mesin_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="mesin_hapus.php?id=<?php echo $d['mesin_id'];?>"><i class="icon-trash-alt"></i></a>
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

			<div class="col-lg-6">
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Jenis Finishing</h4>						
					</div>
					<div class="panel-body">
						<a href="jenis_finishing_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH JENIS FINISHING</a>
						<a href="#" class="btn btn-sm bg-green">EXCEL</a>
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Jenis Finishing</th>		
										<th>Kategori</th>		
										<th>HPP</th>												
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from jenis_finishing order by jenis_finishing_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['jenis_finishing_nama'] ?></td>
											<td><?php echo $d['jenis_finishing_kategori'] ?></td>			
											<td>Rp. <?php echo number_format($d['jenis_finishing_hpp']); ?></td>														
											<td>		
												<?php if($d['jenis_finishing_id']!=1){ ?>																			
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="jenis_finishing_edit.php?id=<?php echo $d['jenis_finishing_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="jenis_finishing_hapus.php?id=<?php echo $d['jenis_finishing_id'];?>"><i class="icon-trash-alt"></i></a>
												<?php } ?>
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







		<div class="row">
			<div class="col-lg-6">
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Jenis Potong</h4>						
					</div>
					<div class="panel-body">
						<a href="jenis_potong_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH JENIS POTONG</a>
						<a href="#" class="btn btn-sm bg-green">EXCEL</a>
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Jenis Potong</th>		
										<th>Kategori</th>		
										<th>HPP</th>												
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from jenis_potong order by jenis_potong_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['jenis_potong_nama'] ?></td>
											<td><?php echo $d['jenis_potong_kategori'] ?></td>			
											<td>Rp. <?php echo number_format($d['jenis_potong_hpp']); ?></td>														
											<td>			
												<?php if($d['jenis_potong_id']!=1){ ?>																			
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="jenis_potong_edit.php?id=<?php echo $d['jenis_potong_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="jenis_potong_hapus.php?id=<?php echo $d['jenis_potong_id'];?>"><i class="icon-trash-alt"></i></a>
												<?php } ?>
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

			<div class="col-lg-6">
				
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Daftar Jenis display</h4>						
					</div>
					<div class="panel-body">
						<a href="jenis_display_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH JENIS DISPLAY</a>
						<a href="#" class="btn btn-sm bg-green">EXCEL</a>
						<br/>
						<br/>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped table-datatable">
								<thead>
									<tr>
										<th width="1%">No</th>
										<th>Jenis Display</th>											
										<th>HPP</th>												
										<th width="15%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($config,"select * from jenis_display order by jenis_display_id desc");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $d['jenis_display_nama'] ?></td>												
											<td>Rp. <?php echo number_format($d['jenis_display_hpp']); ?></td>														
											<td>			
												<?php if($d['jenis_display_id']!=1){ ?>																			
												<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="jenis_display_edit.php?id=<?php echo $d['jenis_display_id'];?>"><i class="icon-wrench3"></i></a>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="jenis_display_hapus.php?id=<?php echo $d['jenis_display_id'];?>"><i class="icon-trash-alt"></i></a>
												<?php } ?>
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

		</div>

	</div>
</div>

<?php include 'footer.php'; ?>