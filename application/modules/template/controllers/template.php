<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Template extends MY_Controller {

	function __construct() {
		parent::__construct();
	}

	public function test() 
	{
        $data['content_view'] = "demo_view";
        $data['title'] = "Advantech | Dashboard";
        $this -> load -> view('template_view',$data);
	}
	
	public function load($data){
		if(!$this->session->userdata("id")){
            redirect("user/login_view");
		}else{
		    $this -> load -> view('template_view',$data);
		}
	}

}
