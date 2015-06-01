<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->loadlogin();
	}
	public function loadlogin()
	{
		$this->load->view('login_view');
	}

	public function signup(){
		$this->load->view('signup');
	}
	public function login_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Username','Username','required|trim|xss_clean|callback_validate_credentials');
		$this->form_validation->set_rules('Password','Password','required|md5|trim');
		if($this->form_validation->run()){
			//$posted_data = $this->input->post();
			//$data = array(
			//		'username' => $posted_data['Username'],
			//		'is_logged_in' => 1
			//	);
			//$this->session->set_userdata($data);
			echo true;
		}
		else{
			echo false;
		}
	}
	public function signup_validation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|valid_email|is_unique[tbusers.username]|callback_validate_username');
		$this->form_validation->set_rules('password','Password','required|md5|trim');
		$this->form_validation->set_rules('cpassword','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_rules('emailid','Email Id','required|trim|xss_clean');
		
		$this->form_validation->set_message('[is_unique]',"Username already Exists!!");

		if($this->form_validation->run()){
			$key = md5(uniqid());
			$this->load->helper('date');			
			$this->load->model('Model_users');
			$user = array(
				'FirstName' => $this->input->post('firstname'),
				'LastName' =>$this->input->post('lastname'),
				'UserName' =>$this->input->post('username'),
				'Password' =>$this->input->post('password'),
				'Salt' => $key,
				'InsanNo' =>$this->input->post('insnumber'),
				'MobileNo' =>$this->input->post('mobileno'),
				'Email' =>$this->input->post('emailid'),
				'IsAnonymous' =>0,
				'IsApproved' =>0,
				'IsLockedOut' =>0,
				'LastLoginDate' =>now(),
				'LastPasswordChangeDate' =>now(),
				'LastLockedoutDate' =>now(),
				'PasswordQuestion' =>$this->input->post('secquestion'),
				'PasswordAnswer' => $this->input->post('secanswer'),
				'FailedPasswordAttemptCount' =>0,
				'FailedPasswordAnswerAttemptCount' =>0
			);

			if($this->model_users->insert_user($user)){
				//generate a random key
				/*$this->load->library('email', array('mailtype'=>'html'));
				$this->email->from('pankaj.softengg@gmail.com','Pankaj');
				$this->email->to($this->input->post('username'));
				$this->email->subject("Confirm your account!");

				$message = "<p>Thank you for signing up</p>";
				$message .= "<p><a href='".base_url()."login/register_user/$key'>Click here</a> to confirm your account!!</p>";

				$this->email->message($message);

				if($this->email->send()){
					echo "The email has been sent!";
				} else {

					echo "Email failed";
				}*/
				$this->load->view('thanks_view');
				//send a email to user
				//add them to the temp_users db
			} else{
				$this->form_validation->set_message('signup_validation','Error in Inserting user record.');
				return false;
			}
			
		} else {
			$this->signup();
		}
	}

	public function validate_username(){
		$this->load->model('model_users');
		if($this->model_users->check_username()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_username','Username already exists.');
			return false;
		}
	}
	public function validate_credentials(){
		$this->load->model('model_users');
		if($this->model_users->can_log_in()){
			return true;
		}
		else{
			$this->form_validation->set_message('validate_credentials','Incorrect username/password.');
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
