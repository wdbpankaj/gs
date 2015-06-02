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
		//$query->num_rows()
		
		//"UserId":"1",
		//"FirstName":"a","LastName":"a","UserName":"a@a.com",
		//"InsanNo":"123","MobileNo":"321","Email":"321@a.com",
		//"IsAnonymous":"0","IsApproved":"0","IsLockedOut":"0",
		//"LastLoginDate":"0000-00-00 00:00:00",
		//"LastPasswordChangeDate":"0000-00-00 00:00:00",
		//"LastLockedoutDate":"0000-00-00 00:00:00",
		//"PasswordQuestion":"321",
		//"PasswordAnswer":"321",
		//"FailedPasswordAttemptCount":"0",
		//"FailedPasswordAnswerAttemptCount":"0",
		//"CreatedOn":"0000-00-00 00:00:00","ModifiedOn":"0000-00-00 00:00:00",
		//"CreatedBy":null,"ModifiedBy":null,
		//"IsActive":null
		
		if(count($dataset)>0){
			if($dataset['IsApproved'] && !$dataset['IsLockedOut'] && $dataset['IsActive']){
				$this->setSessionData($dataset);
				return true;
			}else{
				return false;
			}
		} else{
			return false;
		}
	}

	public function setSessionData($data){
		$this->session->set_userdata(
			array(
					'userid' => $data['UserId'],
					'username' => $data['UserName'],
					'is_logged_in' => 1
				)
		);
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