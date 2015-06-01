<?php

class Model_users extends CI_Model{
	
	public function can_log_in(){
		$posted_data = $this->input->post();
		$this->db->where('username',$posted_data['Username']);
		$this->db->where('password',md5($posted_data['Password']));

		$query = $this->db->get('tbusers');		
		$dataset = $query->row_array();
		//print_r($this->db->last_query());
		//print_r($query->num_rows());
		//if($query->num_rows()==1){
		//	$dataset = $query->row_array();
		//	$data = array(
		//			'username' => $dataset['Username'],
		//			'is_logged_in' => 1
		//		);
		//	$this->session->set_userdata($data);
		//	return true;
		//} else {			
		//	return false;
		//}
		echo json_encode($dataset);
		if(count($dataset)>0){
			echo $this->session->set_userdata($dataset);
			echo true;
		} else{
			echo false;
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