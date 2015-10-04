<?php

class People_dao extends CI_Model{
		
  function __construct(){
  	parent::__construct();
  	$this -> table_name = 'people';
  }
	
  function get_people($q,$sex){
	    $this -> db -> where('sex',$sex);
	    $this -> db -> like('name', $q);
		$this -> db -> order_by('name');
	    $query = $this->db->get($this -> table_name);
		return $query -> result();
	   
  }
  //update `checked` when check in
  function update_status($id){
  	$data['checked'] = 1;
	
  	$this -> db -> where('id',$id);
	$this -> db -> update($this -> table_name,$data);
  }
  
  function register($data){
  	$this -> db -> insert($this->table_name,$data);
	return $this -> db -> insert_id();
  }
  
}

?>