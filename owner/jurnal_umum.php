	<?php include 'header.php'; ?>
	<!-- Main content -->
	<div class="content-wrapper">

		<!-- Content area -->
		<div class="content">
			<!-- Dashboard content -->
						<div class="row">
                            <div class="rw">
                                <div class="col-md-10">
                                    <form action="jurnal_umum_tgl.php" method="get">
                                        <div class="row">
                                        	<div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            Toko
                                                        </div>
                                                        <select name="toko" class="form-control" required="required">
                                                            <option value="">- Pilih -</option>
                                                            <option value="faskal01">Faskal 1</option>
                                                            <option value="faskal02">Faskal 2</option>
                                                            <option value="all">Semua</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
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
                                <th colspan="7"class="text-center bg-blue-300">JURNAL UMUM</th>
                            </tr>
                            <?php
                            $debit = mysqli_query($config,"select sum(amount) as debit from arus_kas_subentry where type='0'");
                            $totaldebit = mysqli_fetch_assoc($debit);
                            $masuk= $totaldebit['debit'];
                            $kredit = mysqli_query($config,"select sum(amount) as kredit from arus_kas_subentry where type='1'");
                            $totalkredit = mysqli_fetch_assoc($kredit);
                            $keluar= $totalkredit['kredit'];
                            ?>
                            <tr>
                                <th colspan="3" class="text-center bg-grey-300">Jumlah</th>
                                <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($masuk)?></th>
                                <th colspan="2" class="text-center bg-grey-300">Rp. <?php echo number_format($keluar)?></th>
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
                            $aruskas = mysqli_query($config,"select * from arus_kas order by tgl_ak desc");
                            while($ak=mysqli_fetch_array($aruskas)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo date('d/m/Y',strtotime($ak['tgl_ak'])); ?></td>
                                    <td><?php echo $ak['ket_ak']; ?></td>
                                    <?php
                                    $subentry = mysqli_query($config,"select * from arus_kas_subentry where arus_kas_id='".$ak['id_arus_kas']."'");
                                    while($aks=mysqli_fetch_array($subentry)){
                                        $data3 = mysqli_query($config,"select * from ak_tabel where id_ak='".$aks['ak_tabel_id']."'");
                                        $ak_tabel = mysqli_fetch_assoc($data3);
                                    ?>
                                    <td><?php echo $ak_tabel['id_ak'].' - '.$ak_tabel['nama']; ?></td>
                                    <td><?php echo $aks['amount']; ?></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			<br>
			<!-- Footer -->
			<div class="footer text-muted"></div>
			<!-- /footer -->
		</div>
		<!-- /content area -->
	</div>
	<!-- /main content -->

	<?php include 'footer.php'; ?>