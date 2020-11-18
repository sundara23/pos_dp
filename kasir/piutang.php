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
                            <h4 class="panel-title">Data Piutang Usaha</h4>
                        </div>
                        <div class="panel-body">

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-datatable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Invoice</th>
                                        <th>Kostumer</th>
                                        <th>Rincian</th>
                                        <th>Status</th>
                                        <th width="18%">OPSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $kdtoko = $_SESSION['kd_toko'];
                                    $id_admin = $_SESSION['id'];
                                    $data = mysqli_query($config,"select * from transaksi, kostumer where transaksi.trx_customer=kostumer.kostumer_id and transaksi.kd_toko='$kdtoko' and transaksi.trx_ar>'0' order by trx_date desc");
                                    while($d=mysqli_fetch_array($data)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo date('d M Y',strtotime($d['trx_date'])); ?></td>
                                            <td><?php echo $d['trx_invoice'] ?></td>
                                            <td><?php echo $d['kostumer_nama'] ?>
                                                <br/>
                                                <small class="text-muted"><?php echo $d['kostumer_telp']; ?> </small>
                                            </td>
                                            <td width="200px">
                                                <?php
                                                $pembayaran = $d['trx_total_pembayaran'];
                                                $pembayarandiskon = $pembayaran - $d['trx_diskon'];
                                                $pembayaranpajak = $pembayarandiskon * $d['trx_pajak'] / 100;
                                                $totalpembayaran = $pembayarandiskon + $pembayaranpajak;
                                                ?>
                                                <p><b>
                                                        <?php if($d['jenis_barang'] == 'CTK'){
                                                            echo 'Penjualan Percetakan';
                                                        }else{
                                                            echo 'Penjualan ATK';
                                                        } ?>
                                                    </b></p>
                                                Rp. <?php echo number_format($totalpembayaran);?>
                                                <br/>
                                                <small class="text-muted">Grand Total : Rp. <?php echo $d['trx_total_pembayaran']; ?> </small>
                                                <br>
                                                <small class="text-muted">Diskon : Rp. <?php echo $d['trx_diskon']; ?> </small>
                                                <br>
                                                <small class="text-muted">Pajak : <?php echo number_format($d['trx_pajak']); ?> %</small>
                                                <br>
                                                <small class="text-muted">DP : Rp. <?php echo number_format($d['trx_dp']); ?></small>
                                                <br>
                                                <small class="text-muted">Piutang : Rp. <?php echo number_format($d['trx_ar']); ?></small>
                                                <br>
                                            </td>
                                            <td>
                                                <?php
                                                if($d['trx_status']=="0"){
                                                    echo "Proses Design/Setting";
                                                }else if($d['trx_status']=="1"){
                                                    echo "Proses Pembayaran";
                                                }else if($d['trx_status']=="2"){
                                                    echo "Proses Cetak";
                                                }else if($d['trx_status']=="3"){
                                                    echo "Pesanan Selesai";
                                                }else if($d['trx_status']=="9"){
                                                    echo "Dibatalkan";
                                                }else if($d['trx_status']=="8"){
                                                    echo "Costumer Service";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a data-toggle="modal" data-placement="top" title="Bayar Piutang" class="btn btn-success btn-xs" href="#bp<?php echo $d['trx_invoice'];?>"><i class="fas fa-check-circle fa-lg"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal Bayar Piutang-->
                                        <div class="modal fade" id="bp<?php echo $d['trx_invoice'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="bayar_piutang_act.php" method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Bayar Piutang </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <h5>Jumlah Piutang : Rp. <?php echo number_format($d['trx_ar']); ?></h5>
                                                        <p>Simpan Ke</p>
                                                        <input type="hidden" name="id_invoice" value="<?php echo $d['trx_invoice']; ?>">
                                                        <input type="hidden" name="piutang" value="<?php echo $d['trx_ar']; ?>">
                                                        <input type="hidden" name="kd_toko" value="<?php echo $kdtoko; ?>">
                                                        <input type="hidden" name="trx_admin_id" value="<?php echo $id_admin; ?>">
                                                        <input type="hidden" name="trx_costumer" value="<?php echo $d['kostumer_id']; ?>">

                                                        <select class="form-control"  name="simpan_trx[]" required="required">
                                                            <?php
                                                            $simpanke = mysqli_query($config,"select * from ak_tabel where ak_type='Aset' and id_ak>'1111' and id_ak<'1115'");
                                                            while($sk=mysqli_fetch_array($simpanke)){
                                                                ?>
                                                                <option value="<?php echo $sk['id_ak']; ?>"><?php echo $sk['nama']; ?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        <input type="hidden" name="simpan_trx[]" value="6111">
                                                        <input type="hidden" name="type[]" value="0">
                                                        <input type="hidden" name="type[]" value="1">
                                                        <input type="hidden" name="ket_piutang" value="Pembayaran Piutang Usaha dari <?php echo $d['kostumer_nama'] ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger" type="submit">Simpan</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
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
    <script>
        $(function () {
            $('.btn-xs').tooltip()
        })
    </script>
<?php include 'footer.php'; ?>