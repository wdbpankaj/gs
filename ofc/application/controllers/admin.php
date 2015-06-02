<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{

	public function validate_user(){
		if($this->session->userdata('is_logged_in')){
			return true;
		} else {
			return false;
		}
	}
	public function restricted(){
		$this->load->view('restricted_view');
	}


	//***************************************************** COUNTRY METHODS STARTS ***************************************

	function Country(){
		if($this->session->userdata('is_logged_in')){
			$this->load->view('country_view');
		} else {
			redirect('admin/restricted');
		}
	}

	function getcountries(){
		$this->load->model('Model_country');
		echo json_encode($this->Model_country->get_country());
		//echo json_encode($this->db->select('*')->order_by('CountryName')->get('tbcountry')->result_array());		
	}

	function country_list() {
		$this->load->model('Model_country');
        $data['page_no'] = $this->input->post('page_no');
        $data['per_page'] = $this->input->post('per_page');
        $data['total_record'] = $this->Model_country->get_Total(); //$this->db->select('count(1) as cnt')->get('tbcountry')->row()->cnt;

        $this->db->limit($data['per_page'], ($data['page_no'] - 1) * $data['per_page']);
        $data['country_data'] = $this->Model_country->get_country(); // $this->db->select('*')->order_by('CountryId desc')->get('tbcountry')->result_array();
        $this->load->view('countrylist_view', $data);
    }

	function addCountry(){		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('CountryName','CountryName','required|trim|xss_clean');		
		
		if($this->form_validation->run()){
			$this->load->model('Model_country');
			$country = array(
				'CountryName' =>$this->input->post('CountryName'),
				'CreatedOn' =>date("Y-m-d H:i:s"),
				'ModifiedOn' =>date("Y-m-d H:i:s"),
				'CreatedBy' => $this->session->userdata('UserId'),
				'ModifiedBy' => $this->session->userdata('UserId'),
				'IsActive' => 1
			);
			if($this->Model_country->insert_country($country)){
				echo 1;
			} else{
				$this->form_validation->set_message('addCountry','Error in Inserting country record.');				
				$this->load->view('country_view');
			}
			
		} else {			
			$this->Country();
		}
	}

	function updateCountry(){
		$posted_data = $this->input->post();
		$this->load->model('Model_country');
		$country = array(
			'CountryId' => $posted_data['CountryId'],
			'CountryName' =>$posted_data['CountryName']
		);
		echo $this->Model_country->update_country($country);			
	}


//***************************************************** COUNTRY METHODS ENDS ***************************************


//***************************************************** APPLICATION METHODS STARTS ***************************************
	function Application(){
		$this->load->view('application_view');
	}

	function application_list() {
        $data['page_no'] = $this->input->post('page_no');
        $data['per_page'] = $this->input->post('per_page');

        $data['total_record'] = $this->db->select('count(1) as cnt')->get('tbapplications')->row()->cnt;

        $this->db->limit($data['per_page'], ($data['page_no'] - 1) * $data['per_page']);
        $data['application_data'] = $this->db->select('*')->order_by('ApplicationId desc')->get('tbapplications')->result_array();
        $this->load->view('applicationlist_view', $data);
    }

	function updateApplication(){
		$posted_data = $this->input->post();
		$this->load->model('model_application');
		$application = array(
			'ApplicationId' => $posted_data['ApplicationId'],
			'ApplicationName' =>$posted_data['ApplicationName'],
			'Description' =>$posted_data['Description']
		);
		echo $this->model_application->update_application($application);			
	}

	function addApplication(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ApplicationName','ApplicationName','required|trim|xss_clean');		
		$this->form_validation->set_rules('Description','Description','trim|xss_clean');
		$posted_data = $this->input->post();
		print_r($posted_data);
		if($this->form_validation->run()){
			$this->load->model('model_application');
			$application = array(
				'ApplicationName' =>$this->input->post('ApplicationName'),
				'Description' =>$this->input->post('Description'),
				'CreatedOn' =>date("Y-m-d H:i:s"),
				'ModifiedOn' =>date("Y-m-d H:i:s"),
				'CreatedBy' => $this->session->userdata('UserId'),
				'ModifiedBy' => $this->session->userdata('UserId'),
				'IsActive' => 1
			);
			if($this->model_application->insert_application($application)){
				echo 1;
			} else{
				echo 0;
			}			
		} else {			
			echo 0;
		}		
	}

//***************************************************** APPLICATION METHODS ENDS ***************************************


//***************************************************** STATE METHODS STARTS ***************************************
	function State(){
		if($this->session->userdata('is_logged_in')){
			$this->load->model('model_state');
			echo json_encode($data['state'] = $this->model_state->get_state($this->input->post('CountryId')));
			$this->load->view('state_view');
		} else {
			redirect('admin/restricted');
		}		
	}

	function state_list() {
        $this->load->model('model_state');
		
		$data['page_no'] = $this->input->post('page_no');
        $data['per_page'] = $this->input->post('per_page');
        
        $data['total_record'] = $this->model_state->getTotal(); // $this->db->select('count(1) as cnt')->get('tbstate')->row()->cnt;
        
        $this->db->limit($data['per_page'], ($data['page_no'] - 1) * $data['per_page']);
        
        $data['state_data'] = $this->model_state->get_state($this->input->post('CountryId')); // $this->db->select('*')->order_by('StateId desc')->get('tbstate')->result_array();
        
        $this->load->view('statelist_view', $data);
    }

	function updateState(){
		$posted_data = $this->input->post();
		$this->load->model('model_state');
		$state = array(
			'StateId' => $this->input->post('StateId'),
			'CountryId' =>$this->input->post('CountryId'),
			'StateName' =>$this->input->post('StateName'),
			'CreatedOn' =>date("Y-m-d H:i:s"),
			'ModifiedOn' =>date("Y-m-d H:i:s"),
			'CreatedBy' => $this->session->userdata('UserId'),
			'ModifiedBy' => $this->session->userdata('UserId'),
			'IsActive' => 1
		);
		echo $this->model_state->update_state($state);			
	}

	function addState(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('StateName','StateName','required|trim|xss_clean');		
		$this->form_validation->set_rules('CountryId','CountryId','trim|xss_clean');
		
		if($this->form_validation->run()){
			$this->load->model('model_state');
			$state = array(
							'StateId' => $this->input->post('StateId'),
							'CountryId' =>$this->input->post('CountryId'),
							'StateName' =>$this->input->post('StateName')
						);
			if($this->model_state->insert_state($state)){
				echo "Record Saved!";
			} else{
				echo "Invalid Entry";
			}
		}
	}
}	