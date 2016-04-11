
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reset_password extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();// Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));//loading email, validation and session from library
        $this->load->database();//loading database
	}
    
    public function index()
    {
        $this->reset_password();
    }
	//getting user's email id to change password
	public function reset_password()
	{	//checking whether field is empty or not 
		if(isset($_POST['email']) && !empty($_POST['email'])){
		
						$this->load->library("form_validation");
						$this->form_validation->set_rules('email','Email Address', 'trim|required|valid_email'); //checking whether email address is valid
		
					if($this->form_validation->run()== FALSE){
			
						$this->load->view('view_reset_password' , array ('error' => "Please supply valid email address."));//if it doesnot satisfies form validation then prompt message'Please supply valid email address' 
					}
					else{
							$email =trim($this->input->post('email'));//getting email id from user
							$this->load->model('model_login');//loading model_login
							$result = $this->model_login->email_exits($email);// checking whether email exists
								
					if($result){
				
							
						$this->send_reset_password_email($email, $result);
							 
					}
					else{
							$this->load->view('view_reset_password', array('error'=> 'Email address not registererd! Please enter a Valid email address!!'));
					}
				}
			}
			else
			{
				$this->load->view('view_reset_password');
			}	
			
			}
		//send verification email to user's email id
		public function send_reset_password_email($email, $firstname)
	
			{
				$this->load->library('email');//load email libraryv
  				$config = Array(
  				'protocol' => 'smtp',
  				'smtp_host' => 'ssl://smtp.googlemail.com',
  				'smtp_port' => 465,
  				'smtp_user' => 'yashanthy93@gmail.com', // sending from A2Z wheels gmail id
  				'smtp_pass' => 'coolbuddy123', // password for gmail id
  				'mailtype' => 'html',
  				'charset' => 'iso-8859-1',
  				'wordwrap' => TRUE
				);
 				
				
				$msg = "<p><a href='".base_url()."main/reset_password/>Click here </a>if you want to reset your password,
                        if not, then ignore</p>";
				
  				$this->email->initialize($config);//initializng config array
  				$this->email->set_newline("\r\n");
  				$this->email->from('yashanthy93@gmail.com'); // sending from A2Z wheels gmail id
  				$this->email->to($email); // password for gmail id
  				$this->email->subject('Reset your password');
  				$this->email->message($msg);
 
  				if($this->email->send())//exception if email is sent print a message 'sent email'
 				{     echo '<script type="text/javascript">alert("Email has been sent!!")</script>';
								
							//send verification email to user's email id
							$this->load->view('view_update_password');
 				}
 				else //if email is not sent prompt a error message
				{
 				//show_error($this->email->print_debugger());
 				echo '<script type="text/javascript">alert("Email has not  been sent!!")</script>';
					$this->load->view('view_reset_password');
					
				}		
				
			}
	}
?>