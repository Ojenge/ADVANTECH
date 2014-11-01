<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template extends MY_Controller {


	function __construct() {
		parent::__construct();
	}

	public function index() {
	}
	
	public function default_load($data){
		if(!$this->session->userdata("id")){
            redirect("user/login");
		}else{
		    $this -> load -> view('template',$data);
		}
	}

}
