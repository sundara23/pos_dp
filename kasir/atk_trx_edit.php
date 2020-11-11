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
            header("location:atk.php");
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
                        <div class="panel-body">
                            <?php
                            $inv = mysqli_query($config,"select * from transaksi where trx_invoice='$id_invoice'");
                            $in = mysqli_fetch_assoc($inv);
                            ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <h4>Transaksi ATK</h4>
                                    <div style="background: #f0f0f0;padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form action="atk_trx_edit_act.php" method="post">
                                                    <input type="hidden" class="jenis_barang" name="jenis_barang" value="CTK">
                                                    <input type="hidden" class="kd_toko" name="kd_toko" value="<?php echo $_SESSION['kd_toko'];?>">
                                                    <input type="hidden" class="id_admin" name="id_admin" value="<?php echo $_SESSION['id'];?>">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <h2>No. Invoice : <b><?php echo $id_invoice; ?></b></h2>
                                                            <tr class="">
                                                                <input type="hidden" name="id_invoice" value="<?php echo $id_invoice; ?>">
                                                                <th width="15%">Pilih Produk</th>
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
                                <div class="col-md-12">
                                    <h4>Tabel Order</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>PRODUK</th>
                                                <th>LEVEL HARGA</th>
                                                <th>QTY</th>
                                                <th>OPSI</th>
                                                <th>HARGA SUBTOTAL</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $no = 1;
                                            $data = mysqli_query($config,"select * from orderan_atk, produk_atk, level_harga where orderan_atk.kd_produk=produk_atk.kd_produk and orderan_atk.id_level_harga=level_harga.id_level_harga and order_atk_inv='$id_invoice'");
                                            while($d=mysqli_fetch_array($data)){
                                                $n = $no++;
                                                ?>
                                                <form action="atk_trx_hitung.php" method="post">
                                                    <tr>
                                                        <td><?php echo $n; ?></td>
                                                        <td><?php echo $d['nama_produk'] ?></td>
                                                        <td width="300px">
                                                            <select class="form-control" name="level_harga">
                                                                <option value="">Pilih -</option>
                                                                <?php
                                                                $kdproduk = $d['kd_produk'];
                                                                $lvl = mysqli_query($config,"select * from level_harga where level_kd_produk='$kdproduk' ");
                                                                while($p=mysqli_fetch_array($lvl)){
                                                                    if ($p['id_level_harga']==$d['id_level_harga']) {
                                                                        $select="selected";
                                                                    }else{
                                                                        $select="";
                                                                    }
                                                                    echo "<option $select value=".$p['id_level_harga'].">".$p['nama_level']." - Rp. ".number_format($p['harga_level'])."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                        <td width="150px"><input type="number" name="jumlah_order" value="<?php echo $d['order_qty'] ?>" min="0" class="form-control"></td>
                                                        <td width="100px">
                                                            <input type="hidden" name="id_order_atk" value="<?php echo $d['order_atk_id'] ?>">
                                                            <input type="hidden" name="id_invoice" value="<?php echo $id_invoice ?>">
                                                            <p><input type="submit" value="Hitung" class="btn btn-xs btn-warning"></p>
                                                        </td>
                                                        <td width="300px">Rp. <?php echo number_format( $d['order_harga_subtotal']) ?></td>
                                                        <td width="50px"><a class="btn border-danger text-danger btn-flat btn-icon btn-xs"  href="atk_order_hapus.php?id=<?php echo $d['order_atk_id'];?>&id_invoice=<?php echo $id_invoice;?>"><i class="icon-trash-alt"></i></a></td>
                                                    </tr>
                                                </form>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
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
                                            $trx = mysqli_query($config,"select sum(order_harga_subtotal) as totaltrx from orderan_atk where order_atk_inv='$id_invoice'");
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
                                    <input type="hidden" name="jenis_barang" value="ATK">
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
                                    <span class="alpaca-float-right"><a href="atk.php" class="btn btn-primary">Kembali</a></span>

                                </div>
                            </div>
                            </form>
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
                    <form action="atk_diskon_act.php" method="post">
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
                    <form action="atk_pajak_act.php" method="post">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#produk').select2({
                placeholder: 'Pilih Produk',
                allowClear: true
            });
        });
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