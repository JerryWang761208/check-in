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
		$data['check_list'] = $this -> check_dao -> find_view_all();
		$data['people_list'] = $this -> people_dao -> find_all();
		$this->load->view('table',$data);
	}
	
	
	//check list
	
	function show_che($sex){
		$data['check_list'] = $this -> check_dao -> find_view_sex($sex);
		//$data['people_list'] = $this -> people_dao -> find_all($sex);
		 
		$this->load->view('table',$data);	
	}
	
	function delete_all(){
		$this -> check_dao -> delete_all();
		redirect('mgmt/home');
	}
	
	function delete_che($p_id,$sex,$no){
		//delete
		$this -> check_dao -> delete($p_id,$sex,$no);
		$this -> people_dao -> update_checked_to_zero($p_id);
		redirect('mgmt/home/show_che/'.$sex.'#a_head');
	}
	
	
	
	
	
	
	
	
	
	//pre list
	
	function show_pre($sex){
		//$data['check_list'] = $this -> check_dao -> find_view_all($sex);
		$data['people_list'] = $this -> people_dao -> find_all_sex($sex);
		 
		$this->load->view('table',$data);	
	}
	
//swap all about
	//search when swap
	function search(){
		$name = $this -> input -> post('name');
		$sex = $this -> input -> post('sex');
		 if (isset($name)){
      		$q = strtolower($name);
     	 	$data['list'] = $this -> check_dao -> get_people($q,$sex);
			$this -> to_json($data);
   		 }
	}
	
	//exchange two people NO.
	function exchange($f,$s,$sex){
		$this -> check_dao -> exchange($f,$s);
		redirect('mgmt/home/show_che/'.$sex.'#a_head'); 
	}
	
	
	function to_json($json_data) {
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($json_data);
	}
  
	
}
