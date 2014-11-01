<?php

class My_Model extends CI_Model{
	 var $em;
	function __construct() {
		parent::__construct();
		$this->em = $this->doctrine->em;
	}
}
