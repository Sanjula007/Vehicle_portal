
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class updatepassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();// Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email')); //loading email, validation and session from library
        $this->load->database();//loading database
	     //$this->load->model('user_model');
    }
    
   	public function index()
    {
        $this->update_password();
    }

	/*public function reset_password_form($email, $email_code)
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
			}*/
	//updating user's changed password
	  public function update_password(){
	 		
			    if(!isset($_POST['password'] )|| !isset($_POST['password_conf'] )){
							die('Error updating your password');
				 }
			   else 
			   { 		   $this->load->library("form_validation");
			               $this->form_validation->set_rules('password','Password','trim|required|matches[password_conf]' );//validating and checking whether password matches with confirm password
			               $this->form_validation->set_rules('password_conf','Confirm password','trim|required');
			                //$this->load->library('form_validation');
			
							//$email= $this->input->post('email');
			               $password =trim($this->input->post('password')); //getting new password value from the update form
						   $email =trim($this->input->post('email')); //getting email address to change password
			
							if($this->form_validation->run() == FALSE)//if it doesnot satisfies form validation view password update form again
							{
									echo "re-enter your password!!";
									$this->load->view('view_update_password');
							}
							else
							{		$this->load->model('model_login');//loading model_login
									$result = $this->model_login->update_password($password,$email);
									//$result= $this->model_login->update_password();		
								if($result)	{
												$this->load->view('view_update_password_sucess');
						     //$this->session->set_flashdata('message', 'Your password has been updated! You may now login to the site');
											}	
									else
									{
												print_r('Error updating your password');
												//$this->load->view('view_update_password',array('error' =>'Problem updating'));
									}
							}
						}						
					}
	}
?>