<?php

class model_application extends CI_Model{
	
	public function insert_application($application){
		$this->db->insert('tbapplications',$application); // insert data into tbapplication table
		//printf ($this->db->affected_rows());
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}	

	public function get_application(){
		$query = $this->db->get('tbapplications');
		if($query->num_rows()>0){
			return true;
		} else {			
			return false;
		}
	}	

	public function update_application($application){
		$this->db->where('ApplicationId', $application['ApplicationId']);
		$this->db->update('tbapplications', $application);
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}		
}