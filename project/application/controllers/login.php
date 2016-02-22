<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	//require_once 'model_login';

class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 public function index()
 {
   $this->load->helper(array('form'));
   $this->load->view('login_view');
 }

 public function signup()
 {
   
   $this->load->view('register_view');
 }

public function profileview()
 {
   
   $this->load->view('select_view');
 }


public function passview()
 {
   
   $this->load->view('view_reset_password');
 }




public function reset_password(){
	
	if(isset($_POST['email']) && !empty($_POST['email'])){
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules('email','Email Address', 'trim|required|valid_email');
		
		if($this->form_validation->run()== FALSE){
			
			$this->load->view('view_reset_password' , array ('error' => "Please supply valid email address."));
			
		}
		
		else{
			
			$email =trim($this->input->post('email'));
			

			$this->load->model('model_login');
			$result = $this->model_login->email_exits($email);

			//$result = $this->model_login->email_exits($email);
			
			if($result){
				
				$this->send_reset_password_email($email, $result);
				$this->load->view('view_update_password', array('email'=> $email));
				
			}else
			{
				
				$this->load->view('view_reset_password', array('error'=> 'Email address not registererd'));
			}
		}
		}else{
				
				$this->load->view('view_reset_password');
				
			}	
			
		}
		
		public function send_reset_password_email($email, $firstname)
	
		{
			$this->load->library('email');
			$email_code = md5($this->config->item('salt').$firstname);
			
			$this->email->set_mailtype('html');
			$this->email->from($this->config->item('bot email'),'A2Z wheels');
			$this->email->to($email);
			$this->email->subject('Please reset ur password');
			
			$message = '<p> WE want to help you reset your password! Please <strong><a href ="'.base_url() .'login/reset_password_form/' .$email. "/".
			$email_code . '">Click here </a></strong> to reset your password</p>"';
			
			$message .= "<p> thank you</p>";
			
			$this->email->message($message);
			$this->email->send();
			
					
		}

	public function reset_password_form($email, $email_code){
		
		if(isset($email, $email_code)){
			
			$email = trim($email);
			$email_hash = sha1($email.$email_code);
			$verified = $this->model_login->verify_reset_password_code($email, $email_code);
			if($verified){
				$this->load->view('view_update_password', array('email_hash'=> $email_hash, 'email_code'=> $email_code,'email' => $email));
				}
		else{
			$this->load->view('view_reset_password', array('error'=> 'there was a problem with your link. Please click it again or request to reset your password again','email' =>$email)); 
			
		}
		}
		
		
		
	}

	public function update_password(){
			
			/*if(!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] !== sha1($_POST['email'] .$_POST['email_code'])){
				
				
				die('Error updating your password');
				
			}
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email_hash','Email_Hash','trim|required' );
			$this->form_validation->set_rules('email','Email','trim|required' );
			$this->form_validation->set_rules('password','Password','trim|required' );
			$this->form_validation->set_rules('password_conf','Confirm password','trim|required');*/
			//$this->load->library('form_validation');
			
			/*if($this->load->validation->run() == FALSE)
			{
			$this->load->view('view_update_password');
			}
			else{*/
		$this->load->model('model_login');
			$result = $this->model_login->update_password();
		
			//$result= $this->model_login->update_password();		
				
			if($result)	{
							$this->load->view('view_update_password_sucess');
							//$this->session->set_flashdata('message', 'Your password has been updated! You may now login to the site');
					
			}	else{
			
						$this->load->view('view_update_password_sucess');
						$this->load->view('view_update_password',array('error' =>'Problem updating'));
					
			
			}
			}
			
		
			
		public function logout()
		{
		//$this->session->sess_destroy();
			//redirect('index.php/login_view', 'refresh');
			  $this->load->view('login_view');
		}		
				
				
			
			
		}
		

?>