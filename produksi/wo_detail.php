<?php include 'header.php'; ?>
    <!-- Main content -->
    <div class="content-wrapper">
        <?php
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
                    <!-- Traffic sources -->
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
                                        <th>Jumlah</th>
                                        <th>Bahan</th>
                                        <th>Keterangan</th>
                                        <th>Finishing</th>
                                        <th>Lokasi File</th>
                                        <th>Opsi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id_admin = $_SESSION['id'];
                                    $kd_toko = $_SESSION['kd_toko'];
                                    $no = 1;
                                    $data = mysqli_query($config,"select * from orderan, bahan, produk, transaksi, jenis_display, jenis_finishing, jenis_potong where orderan.order_bahan_id=bahan.bahan_id and orderan.jd_id=jenis_display.jenis_display_id and orderan.jf_id=jenis_finishing.jenis_finishing_id and orderan.jp_id=jenis_potong.jenis_potong_id and orderan.order_invoice=transaksi.trx_invoice and orderan.order_produk_id=produk.produk_id and orderan.order_invoice='$id_invoice'");
                                    while($d=mysqli_fetch_array($data)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['produk_nama'] ?></td>
                                            <td><?php echo $d['order_qty'] ?></td>
                                            <td><?php echo $d['bahan_nama'] ?></td>
                                            <td><?php echo $d['order_keterangan']; ?></td>
                                            <td width="300px">
                                                <p>Jenis Display : <b><?php echo $d['jenis_display_nama']; ?></b></p>
                                                <p>Jenis Finishing : <b><?php echo $d['jenis_finishing_nama']; ?></b></p>
                                                <p>Jenis Potong : <b><?php echo $d['jenis_potong_nama']; ?></b></p>
                                            </td>
                                            <td><?php echo $d['lokasi_file']; ?></td>
                                            <td>
                                                <?php if ($d['admin2']==0){ ?>
                                                <a data-placement="top" title="Proses Cetak" class="btn border-blue text-blue btn-flat btn-icon btn-xs" href="wo_proses_act.php?id=<?php echo $d['order_id'];?>&&inv=<?php echo $d['order_invoice'];?>&&admin=<?php echo $id_admin;?>"><i class="icon-wrench3"></i>Proses</a>
                                                <?php }else{
                                                    echo 'Selesai';
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="index.php" class="btn btn-sm btn-primary alpaca-float-right mt-15" >Kembali</a>
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