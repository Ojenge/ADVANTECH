<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class user extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['content_view']='user/index';
	    $this->base_params($data);	
	}

	public function listing($table="user"){
		//Columns
		$columns = array("id", "name", "username","email","phone","active");

		$iDisplayStart = $this -> input -> get_post('iDisplayStart', true);
		$iDisplayLength = $this -> input -> get_post('iDisplayLength', true);
		$iSortCol_0 = $this -> input -> get_post('iSortCol_0', false);
		$iSortingCols = $this -> input -> get_post('iSortingCols', true);
		$sSearch = $this -> input -> get_post('sSearch', true);
		$sEcho = $this -> input -> get_post('sEcho', true);
		$aColumns = $columns;
		$columns = implode(",", $columns);

		// Paging
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$this -> db -> limit($this -> db -> escape_str($iDisplayLength), $this -> db -> escape_str($iDisplayStart));
		}
		// Ordering
		if (isset($iSortCol_0)) {
			for ($i = 0; $i < intval($iSortingCols); $i++) {
				$iSortCol = $this -> input -> get_post('iSortCol_' . $i, true);
				$bSortable = $this -> input -> get_post('bSortable_' . intval($iSortCol), true);
				$sSortDir = $this -> input -> get_post('sSortDir_' . $i, true);

				if ($bSortable == 'true') {
					$this -> db -> order_by($aColumns[intval($this -> db -> escape_str($iSortCol))], $this -> db -> escape_str($sSortDir));
				}
			}
		}
		//Filtering
		if (isset($sSearch) && !empty($sSearch)) {
			for ($i = 0; $i < count($aColumns); $i++) {
				$bSearchable = $this -> input -> get_post('bSearchable_' . $i, true);
				// Individual column filtering
				if (isset($bSearchable) && $bSearchable == 'true') {
					$this -> db -> or_like($aColumns[$i], $this -> db -> escape_like_str($sSearch));
				}
			}
		}

		//Data
		$this -> db -> select('SQL_CALC_FOUND_ROWS ' . str_replace(' , ', ' ', implode(', ', $aColumns)), false);
		$this -> db -> select("$columns");
		$this -> db -> from("$table s");
		$rResult = $this -> db -> get();
		// Data set length after filtering
		$this -> db -> select('FOUND_ROWS() AS found_rows');
		$iFilteredTotal = $this -> db -> get() -> row() -> found_rows;
		// Total data set length
		$this -> db -> select("id");
		$this -> db -> from("$table");
		$total_data= $this -> db -> get();
		$iTotal = count($total_data -> result_array());

		$output = array('sEcho' => intval($sEcho), 'iTotalRecords' => $iTotal, 'iTotalDisplayRecords' => (int)$iFilteredTotal, 'aaData' => array());
		foreach ($rResult->result_array() as $row) {
			$myrow = array();
			$action_link = "delete";
			$action_icon = "<i class='fa fa-trash'></i>";
			foreach ($row as $i => $v) {
				if ($i != "id" && $i != "active") {
					$myrow[] = $v;
				} else {
					if ($i == "id") {
						$id = $v;
					}
				}
				//Delete/enable actions
				if ($i == "active" && $v == 0) {
					$action_link = "enable";
					$action_icon = "<i class='fa fa-check'></i>";
				} 
			}

			$links = "";
			if ($action_link == "delete") {
				$links = "<a href='" . site_url("$table/disable") . "/".$id."' class='delete btn btn-danger btn-xs'>disable</a>";
			}else{
				$links = "<a href='" . site_url("$table/enable") . "/".$id."' class='delete btn btn-success btn-xs'>enable</a>";
			}
			$myrow[] = $links;
			$output['aaData'][] = $myrow;
		}
		echo json_encode($output);
	}

	public function save(){
		$post=$this->input->post();
		$post['password']=md5('12345');
		$this->db->insert("user",$post);
		//notification
		$notification='<div class="alert alert-success alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Saved!</strong> User Saved Successfully.</div>';
        $this->session->set_flashdata("notification",$notification);
		redirect("user");
	}

	public function enable($id=""){
		$this -> db -> where("id", $id);
		$this -> db -> update("user",array("active"=>1));
		//notification
		$notification='<div class="alert alert-success alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Enabled!</strong> User Enabled Successfully.</div>';
        $this->session->set_flashdata("notification",$notification);
		redirect("user");
	}

	public function disable($id=""){
		$this -> db -> where("id", $id);
		$this -> db -> update("user",array("active"=>0));
		//notification
		$notification='<div class="alert alert-danger alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Disabled!</strong> User Disabled Successfully.</div>';
        $this->session->set_flashdata("notification",$notification);
		redirect("user");
	}

	public function login(){
		$data['title'] = "Advantech | Login";
        $this->load->view("user/login_view",$data);
	}

	public function authenticate(){
		 $username=$this->input->post("username",TRUE);
		 $password=$this->input->post("password",TRUE);
		 $table="user";
         
         $post=array(
         	    "username"=>$username,
         	    "password"=>md5($password),
         	    "active"=>1
         	    );

         $query = $this->db->get_where($table,$post);
		 $results=$query->result_array();

		 if($results){
		 	$session_data = $results[0];
			$this -> session -> set_userdata($session_data);
            redirect("project");
		 }else{
			//notification
			$notification='<div class="alert alert-danger alert-dismissable">'
	                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
	                       .'<strong>Failed!</strong> Login Failed.</div>';
	        $this->session->set_flashdata("notification",$notification);
            redirect("user/login");
		 }
	}
	public function forgot(){
		$this->load->view("user/forgot");
	}

	public function reset_password(){
		$email=$this->input->post("email",TRUE);
		$table="user";

	    //notification
		$notification='<div class="alert alert-danger alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Reset!</strong> Password Reset Failed.</div>';

	    $post=array(
	     	    "email"=>$email
	     	    );

         $query = $this->db->get_where($table,$post);
		 $results=$query->result_array();
		 if($results){
			$characters = strtoupper("abcdefghijklmnopqrstuvwxyz");
			$characters = $characters . 'abcdefghijklmnopqrstuvwxyz0123456789';
			$random_string_length = 8;
			$password = '';
			for ($i = 0; $i < $random_string_length; $i++) {
				$password .= $characters[rand(0, strlen($characters) - 1)];
			}
			$e_password = md5($password);
			$sent=$this->send_password($email,$password,$results[0]['name']);
			if($sent){
			//update password in db
			$post=array(
	     	    "password"=>$e_password
	     	    );
		    $this -> db -> where("id", $results[0]['id']);
			$this -> db -> update("user",$post);

			//notification
			$notification='<div class="alert alert-success alert-dismissable">'
	                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
	                       .'<strong>Success!</strong> Password Reset Successful.</div>';
			}
		 }
		 $this->session->set_flashdata("notification",$notification);
         redirect("user/forgot");
	}

	public function send_password($email="",$password="",$user="") {
			$email = trim($email);

			ini_set("SMTP", "ssl://smtp.gmail.com");
			ini_set("smtp_port", "465");

			$sender_user="webadt.chai@gmail.com";
			$sender_pass="WebAdt_052013";
			//settings
			$config['mailtype'] = "html";
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.googlemail.com';
			$config['smtp_port'] = 465;
			$config['smtp_user'] = stripslashes($sender_user);
			$config['smtp_pass'] = stripslashes($sender_pass);

			$this -> load -> library('email', $config);
			$this -> email -> set_newline("\r\n");
			$this -> email -> from($sender_pass, "Gakuyo Real Estate");
			$this -> email -> to("$email");
			$this -> email -> subject("Password Reset");
			$this -> email -> message("Dear $user, This is your new password:<b> $password </b><br>
										<br>
										Regards,<br>
										Gakuyo System Administrator
										");

			//success message else show the error
			if ($this -> email -> send()) {
				$this -> email -> clear(TRUE);
                return true;
			} else {
				return false;
			}
	}
	public function profile(){
		$table="user";
		$id=$this->session->userdata("id");
		$query = $this->db->get_where($table, array('id' => $id));
		$results=$query->result_array();
        $data['results']=json_encode($results[0]);
        $data['id']=$id;
        $data['content_view']=$table.'/profile';
		$this->base_params($data);
	}

	public function update($id=""){
		$post=$this->input->post();
	    $this -> db -> where("id", $id);
		$this -> db -> update("user",$post);
		//notification
		$notification='<div class="alert alert-info alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Update!</strong> User Updated Successfully.</div>';
        $this->session->set_flashdata("notification",$notification);
		redirect("user/profile");
	}

	public function change_password($id=""){
        $table="user";
        $current_password=$this->input->post("current_password",TRUE);
        $new_password=$this->input->post("new_password",TRUE);

        //notification
		$notification='<div class="alert alert-danger alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Failed!</strong> Incorrect Current Password.</div>';

        $post=array(
        	    'id' => $id,
        	    'password'=>md5($current_password)
        	  );

        $query = $this->db->get_where($table,$post);
		$results=$query->result_array();
		if($results){
			$post=array(
        	    'password'=>md5($new_password)
        	     );
		    $this -> db -> where("id", $id);
			$this -> db -> update("user",$post);

		//notification
		$notification='<div class="alert alert-info alert-dismissable">'
                       .'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'
                       .'<strong>Success!</strong> Password Change Successfully.</div>';
		}
        $this->session->set_flashdata("notification",$notification);
		redirect("user/profile");
	}

	public function logout(){
		$this -> session -> sess_destroy();
        redirect("user/login");
	}

	public function base_params($data){
		$data['title'] = 'Gakuyo | Users';
		$data['menu_select'] ="side_user";
		$data['submenu_select'] ="";
		$this -> load -> module('template');
		$this -> template -> default_load($data);
	}
}