<div class="page-header">
	<h1>
		Users
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Profile
		</small>
	</h1>
</div>
<?php echo $this->session->flashdata("notification");?>
<div class="table-header">
	Gakuyo User Profile
</div>
    <div class="modal-content">
      <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('user/update/'.$id);?>">

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
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form>


      <!---Change Password-->
      <div class="table-header">
	Change Password
</div>
    <div class="modal-content">
      <form class="form-horizontal" onsubmit="return passCheck();" role="form" method="post" action="<?php echo site_url('user/change_password/'.$id);?>">

      <div class="modal-body">

        <div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Current Password</b></label>
			<div class="col-sm-9">
			  <input type="password"  name="current_password" placeholder="XXXXXXXX" class="col-xs-10 " required>
			</div>
		</div>

		<div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>New Password</b></label>
			<div class="col-sm-9">
			  <input type="password" id="new_password" name="new_password" placeholder="XXXXXXXX" class="col-xs-10 " required>
			</div>
		</div>

        <div class="form-group">
		  <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Confirm Password</b></label>
			<div class="col-sm-9">
			  <input type="password" id="confirm_password" name="confirm_password" placeholder="XXXXXXXX" class="col-xs-10 " required>
			</div>
		</div>

      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Update</button>
      </div>
      </form>

      <script type="text/javascript">
			$(document).ready(function() {
				var my_array = <?php echo $results; ?>;
			    $.each(my_array, function(i, v) {
					$("#add_"+ i).val(v);
				});
			});

			function passCheck(){
			   if($('#new_password').val() != $('#confirm_password').val()){
			       alert('The new password and confirm password do not match!');
			       return false;
			   }
			   return true;
			}
      </script>	