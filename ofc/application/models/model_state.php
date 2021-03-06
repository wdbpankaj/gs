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

	public function get_state($countryId){
		//$this->db->where('CountryId',$cntry['CountryId']);
		//$this->db->get('tbstate');
		return $this->db->select('StateId,StateName')->order_by('StateId desc')->get_where('tbstate', array('CountryId' => $countryId))->result_array();
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
	
	public function getTotalByCountry($countryId){
		return $this->db->select('count(1) as cnt')->get_where('tbstate', array('CountryId' => $countryId))->row()->cnt;
	}

	public function update_state($state){
		$this->db->where('StateId', $state['StateId']);
		$this->db->update('tbstate', $state);
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}		
}