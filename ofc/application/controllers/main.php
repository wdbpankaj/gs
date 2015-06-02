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
}