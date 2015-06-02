<?php

class Model_country extends CI_Model{
	
	public function insert_country($country){
		$this->db->insert('tbcountry',$country); // insert data into tbcountry table
		//printf ($this->db->affected_rows());
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}	

	public function get_country(){
		return $this->db->select('*')->order_by('CountryName')->get('tbcountry')->result_array();
	}

	public function get_Total(){
		return $this->db->select('count(1) as cnt')->get('tbcountry')->row()->cnt;
	}


	public function update_country($country){
		$this->db->where('CountryId', $country['CountryId']);
		$this->db->update('tbCountry', $country);
		if($this->db->affected_rows()>0){
			return true;
		} else{
			return false;
		}
	}		
}