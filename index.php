<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FASKAL Printing & Advertising</title>

	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">

	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>

	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>	

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/login.js"></script>
</head>
<body class="login-container">
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
			
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<div class="row">
						<div class="login-form">
							<div class="row">

								<div class="panel panel-body">
									<br/>
                                    <img src="images/faskallogo.png" width="100" height="100" class="center-block">
									<h2 style="text-align: center; font-weight: bold;">FASKAL</h2>
									<h4 class="text-muted text-center">Printing & Advertising</h4>
									<br/>
									<?php 

									if(isset($_GET['alert'])){
										if($_GET['alert']=="gagal"){
											echo "<div class='alert alert-danger'>Username dan password tidak sesuai.</div>";
										}
									}
									?>
									<br/>
									<form action="login_act.php" method="post">										
										<div class="form-group has-feedback has-feedback-left">
											<input type="text" class="form-control" placeholder="Username" name="username" required="required">
											<div class="form-control-feedback">
												<i class="icon-user text-muted"></i>
											</div>
										</div>

										<div class="form-group has-feedback has-feedback-left">
											<input type="password" class="form-control" placeholder="Password" name="password" required="required">
											<div class="form-control-feedback">
												<i class="icon-lock2 text-muted"></i>
											</div>
										</div>

										<div class="form-group">
											<button type="submit" class="btn bg-blue btn-block text-bold">LOGIN</button>											
										</div>										
									</form>	
									<br/>			
								</div>				
							</div>
						</div>
					</div>

					
				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
