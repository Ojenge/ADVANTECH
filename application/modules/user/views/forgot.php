<?php echo doctype('html4-trans');?>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title>Gakuyo | Forgot Password</title>

	<!--links-->
	<?php $this -> load -> view('template/styles');?>

	<!--default scripts-->
	<script src='<?php echo base_url();?>assets/scripts/JQuery/jquery-1.10.2.js' type='text/javascript'></script>
	<script src='<?php echo base_url();?>assets/scripts/Bootstrap/js/bootstrap.min.js' type='text/javascript'></script>

	<style type="text/css">
	   body{
	   	 background-color:#FFF;
	   }
	   .forgot-box { 
	   	 margin-top:10%; 
	   }
	   .forgot-box .toolbar{
	   	 background-color:#6fb3e0;
	   }
	</style>
</head>
<body class="no-skin">
    <div class="container-fluid">
		<div class="row">
		<div class="col-sm-5 col-sm-offset-3">
			<div id="forgot-box" class="forgot-box widget-box no-border">
			    <?php echo $this->session->flashdata("notification");?>
				<div class="widget-body">
					<div class="widget-main">
						<h4 class="header blue lighter bigger">
							<i class="ace-icon fa fa-key"></i>
							Retrieve Password
						</h4>

						<div class="space-6"></div>
						<p>
							Enter your email and to receive instructions
						</p>

						<form action="<?php echo base_url().'user/reset_password'; ?>" method="post">
							<fieldset>
								<label class="block clearfix">
									<span class="block input-icon input-icon-right">
										<input type="email" class="form-control" placeholder="Email" name="email" required/>
										<i class="ace-icon fa fa-envelope"></i>
									</span>
								</label>

								<div class="clearfix">
									<button type="submit" class="width-35 pull-right btn btn-sm btn-info">
										<i class="ace-icon fa fa-lightbulb-o"></i>
										<span class="bigger-110">Send Me!</span>
									</button>
								</div>
							</fieldset>
						</form>
					</div><!-- /.widget-main -->

					<div class="toolbar center">
						<a href="<?php echo base_url().'user/login'; ?>" data-target="#login-box" class="back-to-login-link">
							Back to login
							<i class="ace-icon fa fa-arrow-right"></i>
						</a>
					</div>
				</div><!-- /.widget-body -->
				</div><!-- /.forgot-box -->
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