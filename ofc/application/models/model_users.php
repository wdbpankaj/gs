<?php

class Model_users extends CI_Model{
	
	public function can_log_in(){
		$posted_data = $this->input->post();
		$this->db->where('username',$posted_data['Username']);
		$this->db->where('password',md5($posted_data['Password']));

		$query = $this->db->get('tbusers');
		//print_r($this->db->last_query());
		//print_r($query->num_rows());
		if($query->num_rows()==1){
			return true;
		} else {			
			return false;
		}
	}

	public function check_username(){
		$this->db->where('username',$this->input->post('username'));
		$query = $this->db->get('tbusers');
		if($query->num_rows()==0){
			return true;
		} else {			
			return false;
		}
	}

	public function insert_user($user){
		$this->db->insert('tbusers',$user); // insert data into tbusers table
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}		
}