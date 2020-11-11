	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- Dashboard content -->
						<div class="row">
                            <div class="rw">
                                <div class="col-md-10">
                                    <form action="laporan_uang_tgl.php" method="get">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Bulan
                                                        </div>
                                                        <select name="bulan" class="form-control" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <option value="01">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Tahun
                                                        </div>
                                                        <select name="tahun" class="form-control" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <?php
                                                            $mulai= date('Y') - 50;
                                                            for($i = $mulai;$i<$mulai + 100;$i++){
                                                                $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                                echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-goup">
                                                    <input class="btn btn-primary form-control" value="Filter" type="submit">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
			<!-- /dashboard content -->
			<div class="panel">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-datatable">
                            <thead>
                            <tr>
                                <th colspan="9"class="text-center bg-blue-300">JURNAL UMUM</th>
                            </tr>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Keterangan</th>
                                <th colspan="2" class="text-center">Debit</th>
                                <th colspan="2" class="text-center">Kredit</th>
                            </tr>
                            <tr>
						    	<td>Ket</td>
						    	<td>Nilai</td>
						    	<td>Ket</td>
						    	<td>Nilai</td>
						  	</tr>
						    </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($config,"select * from buku_besar inner join ak_tabel on buku_besar.id_ak = ak_tabel.id_ak");
                            while($d=mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['tgl_ak'] ?></td>
                                    <td><?php echo $d['ket_ak'] ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['debit']) ?></td>
                                    <td><?php echo $d['id_ak'] ?> - <?php echo $d['nama'] ?></td>
                                    <td>Rp. <?php echo number_format($d['kredit']) ?></td>
                                </tr>
                            <?php } ?>

                             <?php
                                        $trx = mysqli_query($config,"select sum(debit) as totaldebit, sum(kredit) as totalkredit from buku_besar");
                                        $total = mysqli_fetch_assoc($trx);
                                        $total_debit= $total['totaldebit'];
                                        $total_kredit = $total['totalkredit'];
                             ?>

                            <tr>
						    	<th colspan="3" class="text-center">Jumlah</th>
						    	<th colspan="2" class="text-center">Rp. <?php echo number_format($total_debit)?></th>
						    	<th colspan="2" class="text-center">Rp. <?php echo number_format($total_kredit)?></th>
						  	</tr>

                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			<br>
			<!-- Footer -->
			<div class="footer text-muted">

			</div>
			<!-- /footer -->

		</div>
		<!-- /content area -->










	</div>
	<!-- /main content -->

	<?php include 'footer.php'; ?>