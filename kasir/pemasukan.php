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
                                <h4>Tambah Pemasukan Lain-Lain</h4>
                                <br>
                                <div style="background: #f0f0f0;padding: 10px;">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="pemasukan_act.php" method="post">
                                                <input type="hidden" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
                                                <input type="hidden" name="id_admin" value="<?php echo $_SESSION['id'];?>">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <tr class="">
                                                            <th width="30%">Disimpan Ke</th>
                                                            <td>
                                                                <select class="form-control" name="pemasukan[]" id="pemasukan1" required>
                                                                    <option value="">Pilih -</option>
                                                                    <?php
                                                                    $pengeluaran = mysqli_query($config,"select * from ak_tabel where ak_type='Aset'");
                                                                    while($p=mysqli_fetch_array($pengeluaran)){
                                                                        ?>
                                                                        <option value="<?php echo $p['id_ak']; ?>"><?php echo $p['nama']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Diterima Dari</th>
                                                            <td>
                                                                <select class="form-control" name="pemasukan[]" id="pemasukan2" required>
                                                                    <option value="">Pilih -</option>
                                                                    <?php
                                                                    $pengeluaran = mysqli_query($config,"select * from ak_tabel where ak_type='Pemasukan'");
                                                                    while($p=mysqli_fetch_array($pengeluaran)){
                                                                        ?>
                                                                        <option value="<?php echo $p['id_ak']; ?>"><?php echo $p['nama']; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Nilai (Rp)</th>
                                                            <td>
                                                                <input type="hidden" name="type[]" value="0">
                                                                <input type="hidden" name="type[]" value="1">
                                                                <input type="number" name="nilai_pemasukan" min="0" class="form-control mata-uang" onkeyup="inputTerbilang();" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Keterangan</th>
                                                            <td>
                                                                <textarea name="ket_pemasukan" class="form-control"></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%"></th>
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
    <script src="../assets/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pemasukan1').select2({
                placeholder: 'Pilih KAS',
                allowClear: true
            });
            $('#pemasukan2').select2({
                placeholder: 'Pilih Pengeluaran',
                allowClear: true
            });
        });
        function inputTerbilang() {
            //membuat inputan otomatis jadi mata uang
            $('.mata-uang').mask('0.000.000.000', {reverse: true});

            //mengambil data uang yang akan dirubah jadi terbilang
            var input = document.getElementsByClassName("terbilang-input").value.replace(/\./g, "");

            //menampilkan hasil dari terbilang
            document.getElementsByClassName("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
        }
    </script>
<?php include 'footer.php'; ?>