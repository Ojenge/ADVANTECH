<div class="page-header">
	<h1>
		Users
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Listing
		</small>
	</h1>
</div>
<div class="table-header">
	Gakuyo Users Listing
</div>
<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#project_modal">
 <i class="glyphicon-plus"></i> Add User
</button>
<?php echo $this->session->flashdata("notification");?>
<div id="table_grid" class="table-responsive"></div>

<!-- Add Project -->
<div class="modal fade" id="project_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/save');?>">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h1 class="modal-title" id="myModalLabel">Gakuyo | Users</h1>
      </div>

      <div class="modal-body">

        <div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Name</b></label>
			<div class="col-sm-9">
			  <input type="text" id="add_name" name="name" placeholder="Demo User" class="col-xs-10 " required>
			</div>
		</div>

		<div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Username</b></label>
			<div class="col-sm-9">
			  <input type="text" id="add_username" name="username" placeholder="username" class="col-xs-10 " required>
			</div>
		</div>

        <div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Email</b></label>
			<div class="col-sm-9">
			  <input type="email" id="add_email" name="email" placeholder="user@mail.com" class="col-xs-10 " required>
			</div>
		</div>

		<div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Phone</b></label>
			<div class="col-sm-9">
			  <input type="text" id="add_phone" name="phone" placeholder="072XXXXXX" class="col-xs-10 " required>
			</div>
		</div>

      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		var base_url = "<?php echo base_url(); ?>";
      	//default link
		var type = "user";
		var url = base_url + "user/listing/" + type;		
		var div_id = "#table_grid";
		getTable(type, url, div_id);
	});
	function getTable(type, url, div_id) {
		var columns = new Array("Name", "Username", "Email","Phone","options");
		//Generate Columns
		var thead = "<table id='setting_grid' class='table table-bordered table-hover table-condensed'><thead><tr>";
		$.each(columns, function(i, v) {
			thead += "<th>" + v + "</th>";
		});
		thead += "</tr></thead></table>";
		$(div_id).empty();
		$(div_id).append(thead);

		$('#setting_grid').dataTable({
			"bServerSide" : true,
			"sAjaxSource" : url,
		});
	}
</script>	