<?php include 'header2.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
    <div class="content">
        <?php
        show_alert();
        $kdtoko = $_SESSION['kd_toko'];
        $id_admin = $_SESSION['id'];
        if(isset($_GET['id'])){
            $id_invoice = $_GET['id'];
        }else{
            header("location:index.php");
        }
        ?>
        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <?php
                        $inv = mysqli_query($config,"select * from transaksi, kostumer where transaksi.trx_customer=kostumer.kostumer_id and trx_invoice='$id_invoice'");
                        $in = mysqli_fetch_assoc($inv);
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Pemasukan Sebagai Piutang</h4>
                                <br>
                                <div style="background: #f0f0f0;padding: 10px;">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="piutang_setting_ctk_act.php" method="post">
                                                <input type="hidden"  name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
                                                <input type="hidden"  name="id_admin" value="<?php echo $_SESSION['id'];?>">
                                                <input type="hidden"  name="trx_costumer" value="<?php echo $in['trx_customer'];?>">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th width="30%">No. Invoice</th>
                                                            <td>
                                                                <input type="text" class="form-control" name="id_invoice" value="<?php echo $id_invoice; ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Diterima Dari</th>
                                                            <td>
                                                                <input type="hidden" name="simpan_trx[]" value="3111">
                                                                <input type="hidden" name="type[]" value="0">
                                                                <input type="text" class="form-control" value="3111 - PENDAPATAN USAHA" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Disimpan Ke</th>
                                                            <td>
                                                                <input type="hidden" name="simpan_trx[]" value="6111">
                                                                <input type="hidden" name="type[]" value="1">
                                                                <input type="text" class="form-control" value="6111 - PIUTANG USAHA" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Nilai</th>
                                                            <td>
                                                                <input type="text" name="piutang" class="form-control" value="<?php echo $in['trx_ar'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Keterangan</th>
                                                            <td>
                                                                <input type="text" name="ket_piutang" class="form-control" value="Pemasukan Sebagai Piutang dari <?php echo $in['kostumer_nama'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%"></th>
                                                            <td>
                                                                <input type="submit" class="form-control btn btn-primary" value="Simpan">
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