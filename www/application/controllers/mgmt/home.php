<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this -> load -> model('People_dao','people_dao');
		$this -> load -> model('Check_dao','check_dao');
	}
	
	public function index()
	{
		$this->load->view('table');
	}
	
	
	
	
	
	function to_json($json_data) {
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($json_data);
	}
  
	
}
