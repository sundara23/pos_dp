<table class="xxx">
	<?php
	include '../config.php';
	$id=$_GET['id'];
	$data = mysqli_query($config,"select * from kostumer where kostumer_id='$id'");		
	while($d=mysqli_fetch_array($data)){
		?>
		<tr>
			<th>Kostumer</th>
			<th>:</th>
			<td><?php echo $d['kostumer_nama']; ?></td>
		</tr>
		<tr>
			<th>Alamat</th>
			<th>:</th>
			<td><?php echo $d['kostumer_alamat']; ?></td>			
		</tr>
		<tr>
			<th>Email</th>
			<th>:</th>
			<td><?php echo $d['kostumer_email']; ?></td>						
		</tr>
		<tr>
			<th>No.Telp</th>
			<th>:</th>
			<td><?php echo $d['kostumer_telp']; ?></td>									
		</tr>
		<?php
	}
	?>	
</table>