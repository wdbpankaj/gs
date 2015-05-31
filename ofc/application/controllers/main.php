<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller{

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

	public function logout(){
		$this->session->sess_destroy();
		redirect("login/index");
	}
/*
	public function Country(){

		$this->load->view('country_view');
	}

	public function addCountry(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('CountryName','CountryName','required|trim|xss_clean');		
		
		if($this->form_validation->run()){
			$this->load->model('Model_country');
			$country = array(
				'CountryName' =>$this->input->post('CountryName')
			);
			if($this->Model_country->insert_country($country)){
				$this->load->view('thanks_view');
			} else{
				$this->form_validation->set_message('addCountry','Error in Inserting country record.');				
				$this->load->view('country_view');
			}
			
		} else {			
			$this->Country();
		}
	}
	*/
}