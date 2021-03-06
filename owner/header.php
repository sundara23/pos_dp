<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FASKAL</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/colors.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="../assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <script type="text/javascript" src="../assets/js/plugins/datatable/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/datatable/datatables.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/pickers/daterangepicker.js"></script>

    <script  src="../assets/js/core/app.js"></script>

    <script type="text/javascript" src="../assets/js/highcharts/highchart.js"></script>


	<!-- <script type="text/javascript" src="../assets/js/pages/dashboard.js"></script> -->
	<!-- /theme JS files -->
	<?php 
	session_start();
	if($_SESSION['level'] != "owner"){
		header("location:../index.php");
	}
	?>

	<?php include '../config.php'; ?>
	<?php include '../function.php'; ?>
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header">		
			<a class="navbar-brand" href="index.php" style="color: #fff">
                <?php echo $_SESSION['nama_toko']; ?>
			</a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<!-- <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li> -->
				
			</ul>

			<p class="navbar-text"><span class="">Printing & Advertising</span></p>
			
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="../assets/images/unknown.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo $_SESSION['nama']; ?></span>
									<div class="text-size-mini text-muted">
										<?php echo $_SESSION['level_name']; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="index.php"><i class="icon-chart"></i> <span>Grafik</span></a></li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon-list"></i>
                                        <p>
                                            Laporan Digital printing
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="transaksi.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Harian</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi2.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Bulanan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi3.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Tahunan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Piutang</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon-list"></i>
                                        <p>
                                            Laporan ATK
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="transaksi_atk.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Harian</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi_atk2.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Bulanan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi_atk3.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Transaksi Tahunan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Laporan Piutang</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon-list"></i>
                                        <p>
                                            Laporan Keuangan
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="jurnal_umum.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Jurnal Umum</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi2.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Buku Besar</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="transaksi3.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Neraca Saldo</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Neraca</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Rugi Laba</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Saldo Akhir</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Saldo Periode</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Saldo Bulanan</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="piutang.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Saldo Tahunan</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                    <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon far fa-credit-card"></i>
                                        <p>
                                            Transaksi Keuangan
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="transaksi.php" class="nav-link">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>Pengeluaran Tunai</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
								<li><a href="logout.php"><i class="icon-switch2"></i> <span>Logout</span></a></li>								
							</ul>
						</div>
					</div>
					
				</div>
			</div>
			<!-- /main sidebar -->


			