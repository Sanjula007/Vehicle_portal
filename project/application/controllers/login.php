<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	//session_start();
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
				
				
			//Function to reset password	
		public function reset_password()
			{
	
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
				
					}
					
					else
					{
							$this->load->view('view_reset_password', array('error'=> 'Email address not registererd! Please enter a Valid email address!!'));
					}
				}
			}
			else
			{
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

	    public function reset_password_form($email, $email_code)
			{
				if(isset($email, $email_code)){
			
						$email = trim($email);
						$email_hash = sha1($email.$email_code);
						$verified = $this->model_login->verify_reset_password_code($email, $email_code);
						
				if($verified){
						$this->load->view('view_update_password', array('email_hash'=> $email_hash, 'email_code'=> $email_code,'email' => $email));
						}
				else
				{
						$this->load->view('view_reset_password', array('error'=> 'there was a problem with your link. Please click it again or request to reset your password again','email' =>$email)); 
				}
		    	}
			}
		// update password
	   public function update_password(){
	 		
			    if(!isset($_POST['password'] )|| !isset($_POST['password_conf'] )){
							die('Error updating your password');
				 }
			   else 
			   { 		   $this->load->library("form_validation");
			               $this->form_validation->set_rules('password','Password','trim|required|matches[password_conf]' );
			               $this->form_validation->set_rules('password_conf','Confirm password','trim|required');
			//$this->load->library('form_validation');
			
							if($this->form_validation->run() == FALSE)
							{
									$this->load->view('view_update_password');
							}
							else
							{
									$this->load->model('model_login');
									$result = $this->model_login->update_password();
									//$result= $this->model_login->update_password();		
				
								if($result)	{
												$this->load->view('view_update_password_sucess');
						//$this->session->set_flashdata('message', 'Your password has been updated! You may now login to the site');
											}	
									else
									{
												$this->load->view('view_update_password_sucess');
												$this->load->view('view_update_password',array('error' =>'Problem updating'));
									}
							}
						}						
					}
			
		public function check_username()
		{
					if (!isset($_POST['username']))
					{
   				 				return FALSE;
					}
					else
					{
						$username =trim($this->input->post('username'));
						$this->load->model('model_login');
			    		$result = $this->model_login->username_exits($username);
			
					if($result){
				   			$this->update_retrive($username); }
					else 
					{
						$this->load->view('uview', array('error'=> 'Invalid Username!!'));
					}//$this->update_details($username);
			
					}
		
		}
	
	//to check which button user has pressed to perform delete or update fuctions
		public function check_update()
		{
			if($this->input->post('UPDATE')){
			
					if (!isset($_POST['firstname'] ) && !isset($_POST['lastname'] ) && !isset($_POST['email']) && !isset($_POST['mobile'] ))
					{
								 $this->load->view('select_view');
					}
					else
					{
							$firstname =trim($this->input->post('firstname'));
			    			$lastname =trim($this->input->post('lastname'));
			   			      			//$userid =trim($this->input->post('userId'));
						    $email=trim($this->input->post('email'));
						   	$phone=trim($this->input->post('mobile'));
										//$picture=trim($this->input->post('picture'));
		//$this->update_details($firstname,$lastname,$email,$phone);
		// $this->load->view('update_details'); //$this->update_retrive($username);
					if (strlen($phone) == 10) 
					{
							$this->update_details($firstname,$lastname,$email,$phone);
							$this->load->view('update_details');
			      	} 
    				else 
    				{
    						echo "<alert>Invalid Mobile number</alert>";
							$this->update_retrive($firstname);
							//$this->load->view('select_view'); //return false;
					}	
				} }
		        else if($this->input->post('DELETE')){
					
					 if(!isset($_POST['firstname'])){
			 				return false;
					 }
			 		else 
			 		{
							$uname =trim($this->input->post('firstname'));
			   				$this->delete_Account($uname);
				 			 $this->load->view('deleteview');
			 		}
				}
			 else if($this->input->post('UPLOAD'))
			{	//$this->input->post('picture');
				 $this->load->view('upload');
			}
	
			else if($this->input->post('Preview'))
			{	//$this->input->post('picture');
				$username =trim($this->input->post('firstname'));
				$this->files($username);
			}
			else{
			 		 $this->load->view('send_email');
				}
		}
	
	
	//to view profile details
		public function update_retrive($username)
		{	//$username = $this->input->post('username');//print_r($username);
			$this->load->model('user');
			//$d=$this->user->update_retrive($username);
			$data['posts'] = $this->user->update_retrive($username);
			$this->load->view('select_view',$data);
		}
	
		public function update_details($firstname,$lastname,$email,$phone)
		{
	        $dd = array(
					//'id' => $userid,
				'fname' => $firstname,
						'lname' => $lastname,
							'email' => $email,
							'Phone' => $phone,
												);
					//this->update_model->update_student_id1($username,$data);
		$this->load->model('user');
		$this->user->update_details($firstname,$dd);
		}
			
			
		//to send email for any verification
		public function send_email()
		{
			 $config = Array(
    		 'protocol' => 'smtp',
     		 'smtp_host' => 'mail.mydomain.com',
    		 'smtp_port' => 587,
             'smtp_user' => 'user@mydomain.com', // change it to yours
             'smtp_pass' => '12345678',// change it to yours
             'mailtype' => 'html',
             'charset' => 'iso-8859-1',
             'wordwrap' => TRUE
 			 ); //$this->email->initialize($config);  
			$this->load->library("form_validation");// $this->form_validation->set_rules('from','Email Address', 'required|valid_email');
		 		 $this->form_validation->set_rules('to','Email Address', 'required|valid_email');
		 			 $this->form_validation->set_rules('msg','Message', 'required');
			$this->load->library('email');
			$this->email->initialize($config);  
			$this->email->set_newline("\r\n");
			$this->email->from("user@mydomain.com");
			$this->email->to("shangaisteels@gmail.com");
			$this->email->subject("Message");
			$this->email->message("heyyyy!!!");
			
				$this->email->send();	
			echo $this->email->print_debugger();		
			
			
		}
		
	
	// Function implemented to upload profile pictues
		
		public function upload_file()
		{
				$username =trim($this->input->post('username'));
				if($this->input->post('UploadImage')){
							$status="";
							$msg="";
							$filename='picture';
				if(empty($_POST['username'])){
							$status="error";
							$msg="Please Enter Username";
				}
				if($status != "error")
				{
							$config['upload_path'] ='file/';
							$config['allowed_types'] ='gif|jpg|png';
							$config['max_size'] =1024 * 8;
							$config['encrypt_name'] = true;
			
							$this->load->library('upload', $config);
			
						if(!$this->upload->do_upload($filename)){
							$status="error";
							$msg = $this->upload->display_errors('','');
				}
				else
				{
					$this->load->model('user');
					$data= $this->upload->data();
					$file_id=$this->user->insert_file($data['file_name'],$_POST['username']);
					if(!$file_id)
					{
							echo"unSuccessfully uploaded!";
							 $this->load->view('upload');
																}
					else
					{
							echo"Successfully uploaded!";
							$this->load->view('upload');
					}
				}
			 }
			
			else {
					echo "Don't keep empty boxes!Browse your image properly!!";
					$this->load->view('upload');
				} 
			}
			else{
					$this->file1($username);
				}
		}
		//To retrieve image from db
		
		public function files($username)
		{
			$this->load->model('user');
				//$this->load->view('homeview2');	
			$data['posts'] = $this->user->getalldata($username);
			$this->load->view('homeview2',$data);
		}
		//To view saved image
		public function file1($username)
		{
			$this->load->model('user');
				//$this->load->view('homeview2');	
			$data['posts'] = $this->user->getalldata($username);
			$this->load->view('Imageview',$data);
		}
		//To delete an Account 
		public function delete_Account($uname)
		{
			$this->load->model('user');
			$this->user->delete($uname);
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