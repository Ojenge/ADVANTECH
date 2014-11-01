<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title;?></title>
    <!--CSS Links-->
	<?=$this -> load -> view('template/styles_view');?>

	<!--JS Scripts-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/template/js/jquery.js"></script>
</head>
<body class="texture">
	<div id="cl-wrapper" class="login-container">
		<div class="middle-login">
			<div class="block-flat">
				<div class="header">							
					<h3 class="text-center"><img class="logo-img" src="<?php echo base_url(); ?>assets/template/images/logo.png" alt="logo"/>Monitoring &amp; Evaluation</h3>
				</div>
				<div>
					<form style="margin-bottom: 0px !important;" class="form-horizontal" action="./template/test">
						<div class="content">
							<h4 class="title">Login Access</h4>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" placeholder="Username" id="username" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-lock"></i></span>
											<input type="password" placeholder="Password" id="password" class="form-control">
										</div>
									</div>
								</div>
								
						</div>
						<div class="foot">
							<button class="btn btn-default" data-dismiss="modal" type="button">Register</button>
							<button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
						</div>
					</form>
				</div>
			</div>
			<div class="text-center out-links"><a href="#">&copy; <?php echo date('Y'); ?> Advantech Consulting</a></div>
		</div> 
	</div>
	<!--Other Scripts-->
	<?=$this->load->view('template/scripts_view');?>
</body>
</html>
