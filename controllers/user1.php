<?php
class user1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();// Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->library(array('session', 'form_validation', 'email'));//loading email, form validation and session from library
        $this->load->database();
        $this->load->model('user_model');//loading user_model
    }
    
   public function index()
    {
        $this->register();
    }

	//performs register function after pressing sign up button
    public function register()
    {
        //set validation rules
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha|min_length[6]|max_length[30]');// validating username should contain minimum 6 letters
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha|min_length[6]|max_length[30]');// validating lastname should contain minimum 6 letters
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');//email validation
		$this->form_validation->set_rules('phone', 'Phone_no', 'trim|required|min_length[10]|max_length[10]');//phone number should coontain 10 digits
		
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[cpassword]'); //|md5 //checking whether confirm password matches with password
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required');
        
        //validate form input
        if ($this->form_validation->run() == FALSE)
        {
            // fails
            $this->load->view('register_view');
        }
        else
        {
			$name=$this->input->post('fname');//getting username from registration form
			
			$this->load->model('user_model'); //loading user_model
			 $result = $this->user_model->exiting_data($name);// checking whether username existing in database already
			//if username doesnot exists in database 
			if($result != 1){       	
            //insert the user registration details into database
            $data = array(
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
                'email' => $this->input->post('email'),
                 'Phone' => $this->input->post('phone'),
				'password' =>$this->input->post('password')
           );
            
            // insert form data into database
            if ($this->user_model->insertUser($data))
			 {   // send email
               // $this->sendEmail($this->input->post('email'));
                
                    // successfully sent mail
                    $this->session->set_flashdata('msg','<div class="alert alert-success text-center">You are Successfully Registered! An Email has been sent to your Email-ID!Please Signin to your acccount!!!</div>');
                    redirect('user1/register');//redirects to registration form again
                                    
                  //  $this->load->view('login_view');
            }
            
		    else
           	 	{
                // error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
                redirect('user1/register');
            	}
            }
			else{
				//Giving out a msg if any other user as same username(duplicated value)
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Someone already has that username. Try another?</div>');
                  redirect('user1/register');
			
				}
        }
     }
     //sending email after registration
	/*public function sendEmail($to_email)
    {
    		
				$this->load->library('email');//load email library
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
 
  				$this->email->initialize($config);//initializng config array
  				$this->email->set_newline("\r\n");
  				$this->email->from('yashanthy93@gmail.com'); // A2Z wheels gmail id
  				$this->email->to($to_email); // variable which contains registered user's email id
  				$this->email->subject('Your account has been created on A2Z Wheels');
  				$this->email->message('Welcome!<br> Thank you for signing up for an account on A2Z Wheels!!! <br>
  				<a href ="'.base_url() .'http://localhost/ci_intro/'.'">Click here </a>');//sending message containing login page url
 
  				//exception if email is sent print a message 'sent email'
  				if($this->email->send())
 				{
  				echo 'Email sent.';
 				}
 				else//if email is not sent prompt a error message
				{
 				show_error($this->email->print_debugger());
				}	
    }*/
    

    function verify($hash=NULL)
    {
        if ($this->user_model->verifyEmailID($hash))
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-success text-center">Your Email Address is successfully verified! Please login to access your account!</div>');
            redirect('user1/register');
        }
        else
        {
            $this->session->set_flashdata('verify_msg','<div class="alert alert-danger text-center">Sorry! There is error verifying your Email Address!</div>');
            redirect('user1/register');
        }
    }
    }
?>