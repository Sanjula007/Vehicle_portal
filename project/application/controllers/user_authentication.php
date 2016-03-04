<?php
//session_start(); //we need to start session in order to access it through CI
Class User_Authentication extends CI_Controller {

public function __construct() {
parent::__construct();
// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('login_database');
$this->load->model('profile_model');

}

// Show login page
public function index() 
{
	$this->load->view('myLogin_form');
}

// Show registration page
public function user_registration_show() 
{
	$this->load->view('registration_form');
}

public function admin_login() 
{
//$this->load->view('admin_page');
	$this->load->view('admin_view');
}

// Logout from admin page
public function logout() 
{
	// Removing session data
	$sess_array = array
	(
		'username' => ''
	);
	$this->session->unset_userdata('logged_in', $sess_array);
	$data['message_display'] = 'Successfully Logout';
	$this->load->view('login_form', $data);
}


public function reset_password()
{
	if(isset($_POST['email']) && !empty($_POST['email']))
	{
		$this->load->library('form_validation');
		//check if it is valid email or not
		$this->form_validation->set_rules('email','Email Address','trim|required|min_length[6]|max_length[50]|valid_email|xss_clean');
		if($this->form_validation->run()==FALSE)
		{
			$this->load->view('login_form',array('error'=>'Please enter valid email addess'));
		}
		else
		{
			$email=trim($this->input->post('email'));
			$result=$this->login_database->email_exists($email);
			if($result)
			{
				$this->send_reset_password_email($email, $result);
				$this->load->view('view_reset_password_sent',array('email'=>$email));
			}
			else
			{
				$this->load->view('view_reset_password',array('error'=>'Email address is not registered'));
			}
		}
	}
	else
	{
		$this->load->view('view_reset_password');
	}
}

private function send_reset_password_email($email,$firstname)
{
	$config = Array
	(
	  'protocol' => 'smtp',
	  'smtp_host' => 'ssl://smtp.googlemail.com',
	  'smtp_port' => 465,
	  'smtp_user' => 'adrp.athukorala@gmail.com', // change it to yours
	  'smtp_pass' => 'rashini12', // change it to yours
	  'mailtype' => 'html',
	  'charset' => 'iso-8859-1',
	  'wordwrap' => TRUE
	);
	$message = '';
		
    $this->load->library('email', $config);
	$email_code=md5($this->config->item('salt').$firstname);
	
	  $this->email->set_newline("\r\n");
	  $this->email->from('adrp.athukorala@gmail.  com'); // change it to yours
	  $this->email->to($email);
	  $this->email->subject('Please reset your password at A 2 Z Vehicles');
	  $message='<!DOCTYPE><html><head></head><body>  ';
	  $message='<p>Dear '.$firstname.'</p>';
	  $message.='<p>We want to help you reset your password! Please <strong><a href="'.base_url().
		'/index.php/user_authentication/reset_password_form/'.$email.'/'.$email_code.'">Click Here</a></strong>to reset your password.</p>';
	  $message.='<p>Thank you!</p>';
	  $message.='</body></html>';
      $this->email->message($message);
      if($this->email->send())
     {
      	echo 'Email sent.';
     }
     else
    {
     	show_error($this->email->print_debugger());
    }
}

public function reset_password_form($email,$email_code){
	
	if(isset($email,$email_code))
	{
		$email=trim($email);
		$email_hash=sha1($email.$email_code);
		$verified=$this->login_database->verify_reset_password_code($email,$email_code);
		if($verified)
		{
			$this->load->view('view_update_password',array('email_hash'=>$email_hash,'email_code'=>$email_code,'email'=>$email));
		}
		else
		{
			$this->load->view('view_reset_password',array('error'=>'There was a problem with your link. Please click it again or request to reset your password again','email'=>$email));
		}
	}
}

public function update_password()
{
	if(!isset($_POST['email'],$_POST['email_hash'])||$_POST['email_hash']!=sha1($_POST['email'].$_POST['email_code']))
	{
		die('Error updating your password');
	}
	$this->load->library('form_validation');
	
	$this->form_validation->set_rules('email_hash','Email Hash','trim|required');
	$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
	$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[50]|matches[password_conf]|xss_clean');
	$this->form_validation->set_rules('password_conf','Confirmed Password','trim|required|min_length[6]|max_length[50]|xss_clean');
	if($this->form_validation->run()==FALSE)
	{
		$this->load->view('view_update_password');
	}
	else
	{
		$result=$this->login_database->update_password();
		if($result)
		{
			$this->load->view('view_update_password_success');
		}
		else
		{
			$this->load->view('view_update_password',array('error'=>'Problem updating your password. Please contact'.$this->config->item('admin_email')));
		}
	}
}



// Check for user login process
public function user_login_process() 
{
	// Retrieve session data
	$session_set_value = $this->session->all_userdata();

	// Check for validation
	$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE) 
	{	
		$this->load->view('myLogin_form');
	} 
	else 
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$pwd=md5($this->input->post('password'));
		$key=$this->input->post('password'); 
		$pwd=md5($key); 
		$encrypted_pwd=substr($pwd, 0,20);
		
		$data = array
		(
			'username' => $this->input->post('username'),
			'password' => $encrypted_pwd
		);
		$result = $this->login_database->login2($data);
		//$data is true
		if ($result === TRUE) 
		{
			$username = $this->input->post('username');
			$result = $this->login_database->read_user_information($username);
			//username and pwd is correct
			if ($result !== FALSE) 
			{
				$remember = $this->input->post('remember_me');
				//tick the remember me check box
				if ($remember) 
				{
					$this->session->set_userdata('remember_me', TRUE);
				}
				$sess_data = array
				(
					'username' => $username,
					'passsword' => $password
				);
				$this->session->set_userdata('logged_in', $sess_data);
				$this->load->view('dashboard');
				$getUser=$this->input->post('username');
				$this->session->set_flashdata('flash_username', $getUser);
			}
		}	
		//$data is false
		else 
		{
			$data = array
			(
				'error_message' => 'Invalid Username or Password'
			);
			$this->load->view('myLogin_form', $data);
			
		}
	}
}

// Validate and store registration data in database
public function new_user_registration() 
{

	$this->form_validation->set_rules('firstname', 'Firstname', 'trim|required|xss_clean');
	$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required|xss_clean');
	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
	$this->form_validation->set_rules('username', 'User Name', 'trim|required|xss_clean');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|xss_clean');
	$this->form_validation->set_rules('cpwd', 'Confirm Password','trim|required|matches[password]|xss_clean');
	if ($this->form_validation->run() === FALSE) 
	{
		$this->load->view('test_nav1');
		$this->load->view('test_menu');
		$this->load->view('myRegistration_form');
	}
	else 
	{
			$data=array
			(
				'firstname'=>$this->input->post('firstname'),
				'lastname'=>$this->input->post('lastname'),
				'email'=>$this->input->post('email'),
				'username'=>$this->input->post('username'),
				'password'=>md5($this->input->post('password'))
			);
			
			$result = $this->login_database->registration($data);
			if ($result == TRUE) 
			{
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('myLogin_form', $data);
			} else 
			{
				$data['message_display'] = 'Username already exist!';
				$this->load->view('test_nav1');
				$this->load->view('test_menu');
				$this->load->view('myRegistration_form', $data);
			}
	}
}

public function profile()
{
	$user=$this->session->flashdata('flash_username');
	$data['users'] = $this->profile_model->show_user_details($user);

	//$data['single_user'] = $this->update_model->show_user_id($id);
	$this->load->view('test_nav1');
	$this->load->view('test_menu');
	$this->load->view('profile_view', $data);
	//echo $user;
}	

public function getUserName()
{
	$getUser=$this->input->post('username'); 
	//$this->profile($getUser);
	$this->session->set_flashdata('flash_username', $getUser);
	//$this->profile();
}

}
/* End of file user_authentication.php */
/* Location: ./ci_intro/controllers/mymodule/user_authentication.php */