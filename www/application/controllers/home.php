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
		$this->load->view('login');
	}
	
	function login(){
		$this->load->view('home');
	}
	
	function search(){
		$name = $this -> input -> post('name');
		$sex = $this -> input -> post('sex');
		 if (isset($name)){
      		$q = strtolower($name);
     	 	$data['list'] = $this -> people_dao -> get_people($q,$sex);
			$this -> to_json($data);
   		 }
	}
	
	function checkin(){
		//insert into `checkin`	
		$p_id = $this -> input -> post('p_id');
		$sex = $this -> input -> post('sex');
		$data['no'] = $this -> check_dao -> checkin($p_id,$sex);
		
		//update people status
		$this -> people_dao -> update_status($p_id);
		
		$this -> to_json($data);
		
	}
	//register and check in
	function register(){
		//insert new person
		$name = $this -> input -> post('name');
		$sex = $this -> input -> post('sex');
		$data['name'] = $name;
		$data['sex'] = $sex;
		$p_id = $this -> people_dao -> register($data);
		
		//log in new person who is just registered
		$new_data['no'] = $this -> check_dao -> checkin($p_id,$sex);
		
		//update people status
		$this -> people_dao -> update_status($p_id);
		
		$this -> to_json($new_data);
	}
	
	function show_checked(){
		$sex = $this -> input -> post('sex');
		$data['list'] = $this -> check_dao -> show_checked($sex);
		$this -> to_json($data);		
	}
	
	
	
	function to_json($json_data) {
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($json_data);
	}
  
	
}
