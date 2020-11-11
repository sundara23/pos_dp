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
                            <h4 class="panel-title">Jenis Finishing</h4>
                            <div class="heading-elements">
                                <a href="jf_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH JENIS FINISHING</a>
                                <!-- <a href="#" class="btn btn-sm bg-green">EXCEL</a> -->
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped table-datatable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Jenis Finishing</th>
                                        <th>OPSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    $data = mysqli_query($config,"select * from jenis_finishing where jenis_finishing_id != '0'");
                                    while($d=mysqli_fetch_array($data)){
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['jenis_finishing_nama'] ?></td>
                                            <td>
                                                <a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="jf_edit.php?id=<?php echo $d['jenis_finishing_id'];?>"><i class="icon-wrench3"></i></a>
                                                <a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="jf_hapus.php?id=<?php echo $d['jenis_finishing_id'];?>"><i class="icon-trash-alt"></i></a>
                                            </td>
                                        </tr>
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

<?php include 'footer.php'; ?>