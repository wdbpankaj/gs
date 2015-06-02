<?php

class model_state extends CI_Model{
	
	public function insert_state($state){
		$this->db->insert('tbstate',$state); // insert data into tbstate table
		//printf ($this->db->affected_rows());
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}	

	public function get_state($cntry){
		//$this->db->where('CountryId',$cntry['CountryId']);
		//$this->db->get('tbstate');
		return $this->db->select('*')->order_by('StateId desc')->get_where('tbstate', array('CountryId' => $cntry['CountryId']))->result_array();
		/*$query = $this->db->get_where('tbstate', array('CountryId' => $cntry['CountryId']));
		
		if($query->num_rows()>0){
			return true;
		} else {			
			return false;
		}*/
	}	

	public function getTotal(){
		return $this->db->select('count(1) as cnt')->get('tbstate')->row()->cnt;
	}

	public function update_state($state){
		$this->db->where('stateId', $state['stateId']);
		$this->db->update('tbstate', $state);
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}		
}