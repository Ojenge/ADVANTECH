<?php echo doctype('html4-trans');?>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Gakuyo | Login</title>

	<!--links-->
	<?php $this -> load -> view('template/styles');?>

	<!--default scripts-->
	<script src='<?php echo base_url();?>assets/scripts/JQuery/jquery-1.10.2.js' type='text/javascript'></script>
	<script src='<?php echo base_url();?>assets/scripts/Bootstrap/js/bootstrap.min.js' type='text/javascript'></script>

	<style type="text/css">
	   body{
	   	 background-color:#FFF;
	   }
	   .login-container { 
	   	 margin-top:10%; 
	   }
	</style>
</head>

<body class="no-skin">
    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="login-container">
				    <?php echo $this->session->flashdata("notification");?>
					<div class="center">
						<h1>
							<i class="ace-icon fa fa-leaf blue"></i>
							<span class="blue">Gakuyo</span>
						</h1>
					</div>

					<div class="space-6"></div>

					<div class="position-relative">
						<div id="login-box" class="login-box visible widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<div class="space-6"></div>

									<form action="<?php echo base_url().'user/authenticate'; ?>" method="post">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" class="form-control" placeholder="Username" name="username" required />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" placeholder="Password" name="password" required/>
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>

											<div class="space"></div>

											<div class="clearfix">
												<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
													<i class="ace-icon fa fa-key"></i>
													<span class="bigger-110">Login</span>
												</button>
											</div>

											<div class="space-4"></div>
										</fieldset>
									</form>
									<div class="space-6"></div>
								</div><!-- /.widget-main -->

								<div class="toolbar clearfix">
									<div>
										<a href="<?php echo base_url().'user/forgot'; ?>" data-target="#forgot-box" class="forgot-password-link">
											<i class="ace-icon fa fa-arrow-left"></i>
											I forgot my password
										</a>
									</div>
								</div>
							</div><!-- /.widget-body -->
                            
                            <div class="space-6"></div>

                            <div class="" style="text-align:center;">
							<span class="bigger-100 black">
							<hr/>
								Gakuyo Real Estate Ltd &copy; <?php echo date('Y');?> . All Rights Reserved
							</span>
							</div>
						</div><!-- /.login-box -->
					</div><!-- /.position-relative -->
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
			<!--scripts & footer-->
			<?php 
			$this->load->view('template/scripts');
			?>
		</div>
</body>
</html>

