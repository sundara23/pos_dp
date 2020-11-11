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
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Form Tambah Pesanan</h4>
                                <br>
                                <div style="background: #f0f0f0;padding: 10px;">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="cs_add_act.php" method="post">
                                                <input type="hidden" class="jenis_barang" name="jenis_barang" value="CTK">
                                                <input type="hidden" class="kd_toko" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
                                                <input type="hidden" class="id_admin" name="id_admin" value="<?php echo $_SESSION['id'];?>">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <?php
                                                        $query = mysqli_query($config, "SELECT max(trx_invoice) as kodeTerbesar FROM transaksi");
                                                        $data = mysqli_fetch_array($query);
                                                        $kodeInv = $data['kodeTerbesar'];
                                                        $urutan = (int) substr($kodeInv, 9, 9);
                                                        $urutan++;
                                                        $huruf = "INV";
                                                        $kodeInv = $huruf . sprintf("%09s", $urutan);
                                                        ?>
                                                        <tr>
                                                            <th width="30%">No. Invoice</th>
                                                            <td>
                                                                <input type="text" class="form-control" name="id_invoice" value="<?php echo $kodeInv; ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Pilih Produk</th>
                                                            <td>
                                                                <select class="pilih-produk form-control" name="produk" id="produk">
                                                                    <option value="">Pilih -</option>
                                                                    <?php
                                                                    $produk = mysqli_query($config,"select * from produk");
                                                                    while($p=mysqli_fetch_array($produk)){
                                                                        ?>
                                                                        <option value="<?php echo $p['produk_id']; ?>"><?php echo $p['produk_nama']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Keterangan</th>
                                                            <td>
                                                                <textarea name="ket_produk" class="form-control"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%"></th>
                                                            <td>
                                                                <input type="submit" class="form-control btn btn-primary" value="Tambah pesanan">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">List Pesanan</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-datatable">
                                <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama produk</th>
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th width="22%">OPSI</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <a href="cs.php" class="btn btn-sm btn-primary alpaca-float-right mt-15" >Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="footer text-muted">

	</div>

</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#produk').select2({
                placeholder: 'Pilih Produk',
                allowClear: true
            });
        });
    </script>
<?php include 'footer.php'; ?>