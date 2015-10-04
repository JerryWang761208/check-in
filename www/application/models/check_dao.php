<?php

class Check_dao extends CI_Model{
		
  function __construct(){
  	parent::__construct();
  	$this -> table_name = 'check';
  	$this -> view_name = 'check_view';
  }
	
  function checkin($id,$sex){
  		
	    $data['people_id'] = $id;
	    $this -> db -> insert($this -> table_name,$data);
		
		//get the n.o.
		$no_id = $this -> db -> insert_id();
		$this -> db -> where('sex',$sex);
		$this -> db -> where('id <',$no_id);
		$q = $this -> db -> get($this->view_name);
		$count = $q -> num_rows();
		$no = $count+1;
		
		//update n.o.
		$this -> db -> where('id',$no_id);
		$no_data['no'] = $no;
		$this -> db -> update($this->table_name,$no_data);
		return $no;
		
	   
  }
  
  function show_checked($sex){
  	$this -> db -> where('sex',$sex);
	$this -> db -> order_by('no',"desc");
	$q = $this -> db -> get($this->view_name);
	return $q -> result();
  	
  }
  
  
}

?>