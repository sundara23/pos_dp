<?php include 'header2.php'; ?>
<!-- Main content -->
<style type="text/css" xmlns="http://www.w3.org/1999/html">

.xxx tr th,
.xxx tr td{
	padding: 10px;
}

</style>
<div class="content-wrapper">

	<?php
    $kdtoko = $_SESSION['kd_toko'];
    $id_admin = $_SESSION['id'];
	if(isset($_GET['id'])){
		$id_invoice = $_GET['id'];
	}else{
		header("location:index.php");
	}
	?>

	<!-- Content area -->
	<div class="content">
		<?php show_alert(); ?>
		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
					<div class="panel">
						<div class="panel-body">
							<?php
							$inv = mysqli_query($config,"select * from transaksi where trx_invoice='$id_invoice'");
							$in = mysqli_fetch_assoc($inv);
							?>
							<div class="row">
								<div class="col-md-8">
									<h4>Detail Order</h4>
								</div>
								<div class="col-md-4">
									<h5>

										No. Invoice :
										<b>
											<?php echo $in['trx_invoice']; ?>
										</b>

									</h5>
									<br/>
								</div>
							</div>
							<br/>
							<div class="table-responsive">
									<table class="table table-bordered table-hover table-striped">
										<thead>
											<tr>
												<th width="1%">No</th>
												<th>PRODUK</th>
												<th>BAHAN</th>
												<th>UKURAN / KETERANGAN</th>
												<th>FINISHING</th>
												<th>QTY</th>
												<th>HARGA SATUAN</th>
												<th>BIAYA TAMBAHAN</th>
												<th>SUB TOTAL</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$data = mysqli_query($config,"select * from orderan, produk, bahan, jenis_display, jenis_finishing, jenis_potong where orderan.jd_id=jenis_display.jenis_display_id and orderan.jf_id=jenis_finishing.jenis_finishing_id and orderan.jp_id=jenis_potong.jenis_potong_id and orderan.order_produk_id=produk.produk_id and orderan.order_bahan_id=bahan.bahan_id  and order_invoice='$id_invoice'");
											while($d=mysqli_fetch_array($data)){
												$n = $no++;

												?>
                                                <form action="wo_hitung.php" method="post">
												<tr>
													<td><?php echo $n; ?></td>
													<td><?php echo $d['produk_nama'] ?></td>
													<td><?php echo $d['bahan_nama'] ?></td>
													<td><?php echo $d['order_keterangan'] ?></td>
													<td width="300px">
                                                        <p>Jenis Display : <b><?php echo $d['jenis_display_nama']; ?></b></p>
                                                        <p>Jenis Finishing : <b><?php echo $d['jenis_finishing_nama']; ?></b></p>
                                                        <p>Jenis Potong : <b><?php echo $d['jenis_potong_nama']; ?></b></p>
                                                    </td>
													<td>
                                                        <input type="hidden" name="id_invoice" value="<?php echo $id_invoice;?>" class="form-control id_invoice">
														<input type="hidden" name="id_order" value="<?php echo $d['order_id'] ?>">
														<input type="number" name="jumlah_order" value="<?php echo $d['order_qty'] ?>" min="0" class="form-control" readonly>
													</td>
													<td>
                                                        <input type="hidden" name="harga_satuan" value="<?php echo $d['bahan_jual'] ?>" >
														<input type="text" value="Rp. <?php echo number_format( $d['order_harga_satuan']) ?>" min="1" class="form-control x_harga_satuan<?php echo $n; ?>" style="width: 110px" readonly>
													</td>
                                                    <td width="150px">
                                                        <p><input type="text" name="biaya_tambahan" value="<?php echo $d['biaya_tambahan'] ?>" min="0" class="form-control mata-uang" onkeyup="inputTerbilang();" ></p>
                                                        <p><input type="submit" value="Update" class="btn btn-xs btn-warning"></p>
                                                    </td>
													<td width="150px">Rp. <?php echo number_format( $d['order_harga_sub_total']) ?></td>
												</tr>
                                                </form>
												<?php
											}
											?>
										</tbody>
									</table>
							</div>

							<br/>
							<br/>

							<div class="row">
								<div class="col-md-3">
                                    <form class="form-kostumer">
                                        <table class="table table-bordered table-hover table-striped">
                                            <?php
                                            $query = mysqli_query($config, "SELECT max(kostumer_id) as kodeTerbesar FROM kostumer");
                                            $data = mysqli_fetch_array($query);
                                            $kodeProduk = $data['kodeTerbesar'];
                                            $kodeProduk++;
                                            ?>
                                            <tr>
                                                <th>ID</th>
                                                <td>
                                                    <input type="text" name="id_cust" class="form-control form-id" value="<?php echo $kodeProduk; ?>" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Nama</th>
                                                <td>
                                                    <input type="hidden" name="kd_toko" class="form-control form-kdtoko" value="<?php echo $kdtoko; ?>" >
                                                    <input type="text" name="nama" class="form-control form-nama">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>No. Telp</th>
                                                <td>
                                                    <input type="number" name="telp" class="form-control form-telp">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Alamat</th>
                                                <td>
                                                    <textarea class="form-control form-alamat" name="alamat" style="resize: none;"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>
                                                    <input type="text" name="email" class="form-control form-email">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th></th>
                                                <td>
                                                    <input type="reset" value="Batal" class="btn btn-sm btn-danger">
                                                    <a class="btn btn-sm btn-primary btn-simpan-kostumer">Simpan</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
								</div>
                                <div class="col-md-4">
                                    <form action="wo_add_act.php" method="post">
                                    <a class="pilih-kostumer btn btn-primary btn-sm form-kostumer"><i class="icon-user"></i> Pilih Kostumer</a>
                                    <br><br>
                                    <table class="xxx form-kostumer">
                                        <tr>
                                            <th>Kostumer ID</th>
                                            <th>:</th>
                                            <td><input type="text" class="form-control" name="trx_costumer" value="" readonly></td>
                                        </tr>
                                        <tr>
                                            <th>Kostumer</th>
                                            <th>:</th>
                                            <td><?php  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <th>:</th>
                                            <td><?php  ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th>:</th>
                                            <td><?php  ?></td>
                                        </tr>
                                        <tr>
                                            <th>No.Telp</th>
                                            <th>:</th>
                                            <td><?php  ?></td>
                                        </tr>
                                    </table>
                                </div>
								<div class="col-md-5">

									<table class="table">
										<tr>
                                            <?php
                                            $trx = mysqli_query($config,"select sum(order_harga_sub_total) as totaltrx from orderan where order_invoice='$id_invoice'");
                                            $jumlah = mysqli_fetch_assoc($trx);
                                            $jumlahtrx = $jumlah['totaltrx'];
                                            ?>
											<th width="40%">Total</th>
											<td width="60%">Rp. <?php echo number_format($jumlahtrx); ?></td>
											<td width="1%"></td>
										</tr>
                                        <?php
                                        if ($in['trx_diskon'] == 0){

                                        }else {
                                            ?>
                                            <tr>
                                                <th>Diskon (Rp)</th>
                                                <td>Rp. <?php echo number_format($in['trx_diskon']); ?></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                        if ($in['trx_pajak'] == 0){

                                        }else {
                                            ?>
                                            <tr>
                                                <th>Pajak (%)</th>
                                                <td><?php echo $in['trx_pajak']; ?> %</td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
										<tr>
											<th>Grand Total</th>
                                            <?php
                                            $diskon = $in['trx_diskon'];
                                            $pajak =  $in['trx_pajak'];
                                            $total =  $jumlahtrx;
                                            $grandtotal = $total - $diskon;
                                            $totalpajak = $grandtotal*$pajak/100;
                                            $grandtotalpajak = $grandtotal + $totalpajak;
                                            ?>
                                            <td>Rp. <?php echo number_format($grandtotalpajak); ?></td>
											<td></td>
										</tr>
                                        <tr>
                                            <td colspan="3"> <a data-toggle="modal" href="#diskon" class="btn btn-primary btn-xs"> Tambah/Edit Diskon</a> <a data-toggle="modal" href="#pajak" class="btn btn-warning btn-xs"> Tambah/Edit Pajak</a></td>
                                        </tr>
                                        <tr>
                                            <th>Pilih Jenis Pembayaran</th>
                                            <td>
                                                <select class="form-control" id="pembayaran" name="trx_jenis_pembayaran" required="required">
                                                    <option value="">- Pilih</option>
                                                    <?php
                                                    $jns_byr = mysqli_query($config,"select * from jenis_pembayaran");
                                                    while($p=mysqli_fetch_array($jns_byr)){
                                                        ?>
                                                        <option value="<?php echo $p['jenis_pembayaran_id']; ?>"><?php echo $p['jenis_pembayaran_nama']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr id="dp">
                                            <th>DP</th>
                                            <td><input type="text" min="0" name="trx_dp" class="form-control mata-uang byrawal" required="required" value="<?php echo $in['trx_dp']; ?>" onkeyup="inputTerbilang();"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Simpan Ke</th>
                                            <td>
                                                <select class="form-control"  name="simpan_trx" required="required">
                                                    <?php
                                                    $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset'");
                                                    while($sk=mysqli_fetch_array($simpanke)){
                                                        ?>
                                                        <option value="<?php echo $sk['id_ak']; ?>"><?php echo $sk['nama']; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
									</table>

									<br/>
									<br/>
                                    <input type="hidden" name="jenis_barang" value="CTK">
                                    <input type="hidden" name="trx_lunas" value="<?php echo $grandtotalpajak; ?>">
                                    <input type="hidden" name="trx_total_pembayaran" value="<?php echo $jumlahtrx; ?>">
                                    <input type="hidden" name="trx_admin_id" value="<?php echo $id_admin; ?>">
                                    <input type="hidden" name="trx_id" value="<?php echo $id_invoice; ?>">
                                    <input type="hidden" name="kd_toko" value="<?php echo $kdtoko; ?>">
                                    <input type="submit" value="Simpan" class="btn btn-primary" id="simpan_trx">
                                    <?php
                                    if ($in['trx_jenis_pembayaran']==0){

                                    }else{
                                    ?>
                                    <a href="#" class="btn btn-success" id="cetak_nota" ><i class="fas fa-print"></i> Cetak Nota</a>
                                    <a href="#" class="btn btn-danger" id="download_inv" ><i class="fas fa-download"></i> Download Invoice</a>
                                    <?php } ?>
                                    <span class="alpaca-float-right"><a href="index.php" class="btn btn-primary">Kembali</a></span>

								</div>
							</div>
                        </form>
							<br/>

						</div>
					</div>
			</div>

		</div>

	</div>
    <!-- Modal diskon-->
    <div class="modal fade" id="diskon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah atau Edit Diskon </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="wo_diskon_act.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                    <?php
                    $data = mysqli_query($config,"select * from transaksi where trx_invoice='$id_invoice'");
                    while($d=mysqli_fetch_array($data)) {
                        ?>
                        <p>Nilai Diskon (Rp)</p>
                        <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                        <p><input type="number" name="diskon" value="<?php echo $d['trx_diskon']; ?>" min="0" class="form-control col-md-4 mata-uang" onkeyup="inputTerbilang();" ></p>
                        <?php
                    }
                    ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal pajak-->
    <div class="modal fade" id="pajak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah atau Edit Pajak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="wo_pajak_act.php" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                $data = mysqli_query($config,"select * from transaksi where trx_invoice='$id_invoice'");
                                while($d=mysqli_fetch_array($data)) {
                                    ?>
                                    <p>Nilai Pajak (%)</p>
                                    <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                                    <p><input type="number" name="pajak" value="<?php echo $d['trx_pajak']; ?>" min="0" max="100" class="form-control" ></p>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

	<div class="footer text-muted">

	</div>

</div>
    <div class="modal fade modal-kostumer " role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Pilih Kostumer</h5>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-datatable">
                            <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th>Nama</th>
                                <th>No.Telp</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th width="1%">OPSI</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = mysqli_query($config,"select * from kostumer where kd_toko='$kdtoko' and kostumer_id>'0' order by kostumer_id desc");
                            while($d=mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['kostumer_nama'] ?></td>
                                    <td><?php echo $d['kostumer_telp'] ?></td>
                                    <td><?php echo $d['kostumer_email'] ?></td>
                                    <td><?php echo $d['kostumer_alamat'] ?></td>
                                    <td>
                                        <a class="btn border-teal text-teal btn-flat btn-icon btn-xs tentukan-kostumer" data-dismiss="modal" id="<?php echo $d['kostumer_id'];?>">Pilih</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

<!--<script src="../assets/js/jquery-1.11.2.min.js"></script>-->
<script src="../assets/js/jquery.mask.min.js"></script>
<script src="../assets/js/terbilang.js"></script>
<script type="text/javascript">
    function inputTerbilang() {
        //membuat inputan otomatis jadi mata uang
        $('.mata-uang').mask('0.000.000.000', {reverse: true});

        //mengambil data uang yang akan dirubah jadi terbilang
        var input = document.getElementsByClassName("terbilang-input").value.replace(/\./g, "");

        //menampilkan hasil dari terbilang
        document.getElementsByClassName("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
    }

	$(document).ready(function(){
        $('#dp').hide();
        $('#simpan_trx').hide();
        $('.form-kostumer').hide();
        $('#pembayaran').on('change', function() {
            var noption = this.value;
            if(noption == 1){
                $('#dp').hide();
                $('.form-kostumer').hide();
                $('#simpan_trx').show();
            }else {
                $('#dp').show();
                $('.form-kostumer').show();
                $('#simpan_trx').hide();
            }
        });
	});

    $(document).ready(function(){
        $('body').on("click",".pilih-kostumer",function(){
            $('.modal-kostumer').modal();
        });

        $('body').on("click",".btn-simpan-kostumer",function(){
            // $('.modal-kostumer').modal();
            var id_cust = $(".form-id").val();
            var nama = $(".form-nama").val();
            var telp = $(".form-telp").val();
            var alamat = $(".form-alamat").val();
            var email = $(".form-email").val();
            var toko = $(".form-kdtoko").val();

            if(nama!=""&&telp!=""&&alamat!=""&&email!=""){
                var data = "nama="+nama+"&telp="+telp+"&alamat="+alamat+"&email="+email+"&kd_toko="+toko;
                $.ajax({
                    data : data,
                    url : 'wo_tambah_ajax.php',
                    method : "POST",
                    success:function(html){
                        $(".kostumer-terpilih").val(html);
                        var url = "wo_tambah_ajax2.php?id="+html;
                        $(".xxx").load(url);
                        $('#simpan_trx').show();
                    }
                });
            }else{
                alert("Isi data dengan lengkap.");
            }
        });




        $('body').on("click",".tentukan-kostumer",function(){
            var id = $(this).attr('id');

            $(".kostumer-terpilih").val(id);
            var url = "wo_tambah_ajax2.php?id="+id;
            $(".xxx").load(url);
            $('#simpan_trx').show();

        });

        $('body').on("click",".btn-submit",function(e){
            var kostumer = $(".kostumer-terpilih").val();
            if(kostumer == ""){
                e.preventDefault();
                alert("data kostumer belum di pilih");
            }
            // else{
            // 	e.preventDefault();
            // 	var produk = $("#produk").val();
            // 	var id_mesin = $("#id_mesin").val();
            // 	var id_bahan = $("#id_bahan").val();
            // 	var id_finishing = $("#id_finishing").val();
            // 	var id_potong = $("#id_potong").val();
            // 	var panjang = $("#panjang").val();
            // 	var lebar = $("#lebar").val();
            // 	var jumlah = $("#jumlah").val();
            // 	alert(produk);
            // 	var order_table = "<tr></tr>";
            // }

        });

    });
</script>

<?php include 'footer.php'; ?>