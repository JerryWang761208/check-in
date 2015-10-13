<?php

class Check_dao extends CI_Model{
		
  function __construct(){
  	parent::__construct();
  	$this -> table_name = 'check';
  	$this -> view_name = 'check_view';
  }
	
  function checkin($id,$sex){
  		
	    $data['people_id'] = $id;
		//check if already checked
		$this -> db -> where('people_id',$id);
		$q = $this -> db -> get($this -> table_name);
		if($q->num_rows() >0){
			return 'already'; //已經簽到了
		}else{
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
	    
		
		
		
	   
  }
  
  function show_checked($sex){
  	$this -> db -> where('sex',$sex);
	$this -> db -> order_by('no',"desc");
	$q = $this -> db -> get($this->view_name);
	return $q -> result();
  	
  }
  
  function find_view_all(){
  	$this -> db -> order_by('sex');
	$this -> db -> order_by('no');
  	$q = $this -> db -> get($this->view_name);
	return $q -> result();
  }
  function find_view_sex($sex){
  	$this -> db -> where('sex',$sex);
  	$this -> db -> order_by('no');
  	$q = $this -> db -> get($this->view_name);
	return $q -> result();
  }
  
  
  //delete all check list 
  function delete_all(){
  	//find check people id
  	$this -> db -> select('people_id');
	$q = $this -> db -> get($this -> table_name);
	$r = $q -> result();
	
  	//update status to zero in people table
  	$data['checked'] = 0;
	foreach($r as $each){
		$this -> db -> where('id',$each->people_id);
		$this -> db -> update('people',$data);
	}
	//delete check list
	$this -> db -> empty_table($this->table_name);
	
  }
  
  function delete($id,$sex,$no){
  	//delete the specific one
  	$this -> db -> where('people_id',$id);
	$this -> db -> delete($this->table_name);
	
	
	
	//update NO. for each no greater than the specific one
		//get update people ids
	$this -> db -> select('people_id,no');
	$this -> db -> where('sex',$sex);
	$this -> db -> where('no >',$no);
	$q = $this -> db -> get($this->view_name);
	foreach($q->result() as $each){
		$this -> db -> where('people_id',$each -> people_id);
		$data['no'] = $each -> no -1;
		$this -> db -> update($this->table_name,$data);
	} 	
  }
  
  //get people when swap
  function get_people($q,$sex){
	    $this -> db -> where('sex',$sex);
	    $this -> db -> like('name', $q);
		$this -> db -> order_by('no');
		$this -> db -> order_by('name');
	    $query = $this->db->get($this -> view_name);
		return $query -> result();
	   
  }
  
  //exchange two people NO.
  function exchange($f,$s){
  	//first no
  	$this -> db -> select('no');
  	$this -> db -> where('id',$f);
	$f_q = $this -> db -> get($this->table_name);
	$f_r = $f_q->result();
	$f_no = $f_r['0']->no;
	//second no
  	$this -> db -> select('no');
  	$this -> db -> where('id',$s);
	$s_q = $this -> db -> get($this->table_name);
	$s_r = $s_q->result();
	$s_no = $s_r['0']->no;
	//exchange
	$data = array(
		array(
			'id'=>$f,
			'no'=>$s_no
		),
		array(
			'id'=>$s,
			'no'=>$f_no
		)
	);
	$this -> db ->update_batch($this->table_name,$data,'id');
  }
  
  
}

?>