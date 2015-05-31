<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Application extends CI_Controller{

	public  function index()
	{
		if($this->session->userdata('is_logged_in')){
			$this->load->view('main_view');
		} else {
			redirect('main/restricted');
		}
		
	}

	public function restricted(){
		$this->load->view('restricted_view');
	}

	public function application_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required|trim|xss_clean|callback_validate_credentials');		

		if($this->form_validation->run()){			
			redirect('application/index');
		}
		else{
			$this->load->view('application_view');
		}
	}
}