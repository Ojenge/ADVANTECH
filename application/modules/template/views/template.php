<?php echo doctype('html4-trans');?>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<title><?php echo $title;?></title>

	<!--links-->
	<?php $this -> load -> view('styles');?>

	<!--default scripts-->
	<script src='<?php echo base_url();?>assets/scripts/JQuery/jquery-1.10.2.js' type='text/javascript'></script>
	<script src='<?php echo base_url();?>assets/scripts/Bootstrap/js/bootstrap.min.js' type='text/javascript'></script>
</head>

<body class="no-skin">
    <!--navbar-->
	<?php      	
	$this->load->view('navbar');
	?>

	<div class="main-container" id="main-container">
		<script type="text/javascript">
		
		</script>
        <!--sidebar-->
		<?php      	
		 $this->load->view('sidebar');
		?>
		<div class="main-content">
			<div class="page-content">
			<!--content_view-->
				<?php 
				$this->load->view($content_view);
				?>
			</div>
		</div>
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>
	<!--scripts & footer-->
	<?php 
	$this->load->view('scripts');
	$this->load->view('footer');
	?>

	<script type="text/javascript"> 
	    try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		$(document).ready(function() {
			$("#sidebar").addClass("sidebar-fixed sidebar-scroll");
			$("#navbar").addClass("navbar-default navbar-fixed-top");			
		});
	</script>
</body>
</html>
