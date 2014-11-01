<!DOCTYPE html>
<html lang="en">  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $title;?></title>
    <!--CSS Links-->
	<?=$this -> load -> view('styles_view');?>

	<!--JS Scripts-->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/template/js/jquery.js"></script>
</head>
<body>
	<!-- Fixed Navbar -->
	<?=$this->load->view('navbar_view');?>
	<!--Full Content & Sidebar-->
	<div id="cl-wrapper" class="fixed-menu">
	<!--Sidebar -->
	<?=$this->load->view('sidebar_view');?>
	<!--Content-->
	<?=$this->load->view($content_view);?>
	</div>
	<!--Other Scripts-->
	<?=$this->load->view('scripts_view');?>
</body>
</html>