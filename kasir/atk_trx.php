<?php include 'header2.php'; ?>
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
                                    <h4>Transaksi ATK</h4>
                                    <div style="background: #f0f0f0;padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form action="atk_trx_add_act.php" method="post">
                                                    <input type="hidden" class="jenis_barang" name="jenis_barang" value="ATK">
                                                    <input type="hidden" class="kd_toko" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
                                                    <input type="hidden" class="id_admin" name="id_admin" value="<?php echo $_SESSION['id'];?>">
                                                    <div class="table-responsive">
                                                        <?php
                                                        $query = mysqli_query($config, "SELECT max(trx_invoice) as kodeTerbesar FROM transaksi");
                                                        $data = mysqli_fetch_array($query);
                                                        $kodeInv = $data['kodeTerbesar'];
                                                        $urutan = (int) substr($kodeInv, 9, 9);
                                                        $urutan++;
                                                        $huruf = "INV";
                                                        $kodeInv = $huruf . sprintf("%09s", $urutan);
                                                        ?>
                                                        <table class="table table-bordered">
                                                            <h2>No. Invoice : <b><?php echo $kodeInv; ?></b></h2>
                                                            <tr class="">
                                                                <input type="hidden" name="id_invoice" value="<?php echo $kodeInv; ?>">
                                                                <th width="30%">Pilih Produk</th>
                                                                <td>
                                                                    <select class="pilih-produk form-control" name="produk_atk" id="produk">
                                                                        <option value="">Pilih -</option>
                                                                        <?php
                                                                        $produk = mysqli_query($config,"select * from produk_atk");
                                                                        while($p=mysqli_fetch_array($produk)){
                                                                            ?>
                                                                            <option value="<?php echo $p['kd_produk']; ?>"><?php echo $p['nama_produk']; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="submit" class="form-control btn btn-primary" value="Tambahkan">
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