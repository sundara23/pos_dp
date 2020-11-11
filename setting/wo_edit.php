<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

	<?php 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header("location:index.php");
	}
	$id_invoice = $_GET['inv'];
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
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Form Setting Pesanan</h4>
                                <br>
                                <div style="background: #f0f0f0;padding: 10px;">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <form action="wo_edit_add_act.php" method="post">
                                                <?php $iduser = $_SESSION['id']; ?>
                                                <input type="hidden" name="inv" value="<?php echo $id_invoice; ?>">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="user" value="<?php echo $iduser; ?>">
                                                <div class="table-responsive">
                                                    <?php
                                                    $data = mysqli_query($config,"select * from orderan where order_id='$id'");
                                                    while($d=mysqli_fetch_array($data)){
                                                    ?>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th width="30%">No. Invoice</th>
                                                            <td>
                                                                <input type="text" class="form-control" name="id_invoice" value="<?php echo $id_invoice; ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Jumlah</th>
                                                            <td>
                                                                <input type="number" min="0" step="0.01" name="jumlah" class="form-control" required="required" value="<?php echo $d['order_qty']; ?>">
                                                                <small><i>gunakan titik (.) bukan koma </i></small>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Pilih Bahan</th>
                                                            <td>
                                                                <select name="bahan" class="form-control" required="required" id="bahan">
                                                                    <?php
                                                                    $data = mysqli_query($config,"select * from bahan where bahan_id != '0'");
                                                                    while($b=mysqli_fetch_array($data)){
                                                                        if ($b['bahan_id']==$d['order_bahan_id']) {
                                                                            $select="selected";
                                                                        }else{
                                                                            $select="";
                                                                        }
                                                                        echo "<option $select value=".$b['bahan_id'].">".$b['bahan_nama']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Jenis Display</th>
                                                            <td>
                                                                <select name="jenis_display" class="form-control" required="required" id="jenis_display">
                                                                    <?php
                                                                    $data = mysqli_query($config,"select * from jenis_display");
                                                                    while($jd=mysqli_fetch_array($data)){
                                                                        if ($jd['jenis_display_id']==$d['jd_id']) {
                                                                            $select="selected";
                                                                        }else{
                                                                            $select="";
                                                                        }
                                                                        echo "<option $select value=".$jd['jenis_display_id'].">".$jd['jenis_display_nama']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Jenis Finishing</th>
                                                            <td>
                                                                <select name="jenis_finishing" class="form-control" required="required" id="jenis_finishing">
                                                                    <?php
                                                                    $data = mysqli_query($config,"select * from jenis_finishing");
                                                                    while($jf=mysqli_fetch_array($data)){
                                                                        if ($jf['jenis_finishing_id']==$d['jf_id']) {
                                                                            $select="selected";
                                                                        }else{
                                                                            $select="";
                                                                        }
                                                                        echo "<option $select value=".$jf['jenis_finishing_id'].">".$jf['jenis_finishing_nama']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr class="">
                                                            <th width="30%">Jenis Potong</th>
                                                            <td>
                                                                <select name="jenis_potong" class="form-control" required="required" id="jenis_potong">
                                                                    <?php
                                                                    $data = mysqli_query($config,"select * from jenis_potong");
                                                                    while($jp=mysqli_fetch_array($data)){
                                                                        if ($jp['jenis_potong_id']==$d['jp_id']) {
                                                                            $select="selected";
                                                                        }else{
                                                                            $select="";
                                                                        }
                                                                        echo "<option $select value=".$jp['jenis_potong_id'].">".$jp['jenis_potong_nama']."</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th width="30%">Keterangan</th>
                                                            <td>
                                                                <textarea name="ket_produk" class="form-control" readonly><?php echo $d['order_keterangan']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lokasi File</th>
                                                            <td>
                                                                <textarea name="lok_file" class="form-control"><?php echo $d['lokasi_file']; ?></textarea>
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
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                    <a href="wo_detail.php?id=<?php echo $id_invoice;?>" class="btn btn-sm btn-primary alpaca-float-right mt-15" >Kembali</a>
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
            $('#bahan').select2({
                placeholder: 'Pilih Bahan',
                allowClear: true
            });
            $('#jenis_display').select2({
                placeholder: 'Pilih Jenis Display',
                allowClear: true
            });
            $('#jenis_finishing').select2({
                placeholder: 'Pilih Jenis Finishing',
                allowClear: true
            });
            $('#jenis_potong').select2({
                placeholder: 'Pilih Jenis Potong',
                allowClear: true
            });

        });
    </script>

<?php include 'footer.php'; ?>