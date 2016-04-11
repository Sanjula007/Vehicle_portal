<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	//require_once 'model_login';

class Login extends CI_Controller {

 		public function __construct()
				 {
 					  parent::__construct();
					  $this->load->helper(array('form','url'));
					   $this->load->library(array('session', 'form_validation', 'email'));
					  //$this->logged_in();
				 }

		public function index()
				 {
 					  $this->load->helper(array('form'));
  						 $this->load->view('login_view');
						//print_r($this->session->all_userdata());
						 
						// session_start();
				 }

 		public function signup()
				{
 		  				$this->load->view('register_view');
 				}


		public function profileview()
				{
	    				 $this->load->view('select_view');
 				}
 
 		public function deleteview()
 				{
   				 		$this->load->view('deleteAccount');
 				}
 
 
 
		public function passview()
 				{
 		  			 $this->load->view('view_reset_password');
				}


		public function userview()
 				{
     				 $this->load->view('uview');
 				}	

			
		public function Homeview()
 				{
    				 $this->load->view('home_v1');
 				}	
				
		public function Homeview1()
 				{
     				 $this->load->view('home_view');
 				}	
				
		public function Signin()
 				{
     				 $this->load->view('login_view');
 				}	
				
	    public function reset_pass()
 				{
     				 $this->load->view('view_update_password', array('email'=> $email));
 				}	
		public function userlogin()
 				{
     				 $this->load->view('buser_login');
				}	
		public function send_mail()
 				{
     				 $this->load->view('send_email_bus');
				}			
    	public function leave_comment()
 				{
     				 $this->load->view('comments');
				}			
    	
	
	
		public function logged_in()
		{            $logged_in = $this->session->userdata('logged_in');
	                         if(!isset($logged_in)|| $logged_in != true) {
		                             echo "You don't have perssion to access";
							         die();
								}
		}
		public function logout()
		{
				$this->session->sess_destroy();
				//redirect('index.php/login_view', 'refresh');
			  	$this->load->view('login_view');
		}		
	}
?>