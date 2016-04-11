<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 	//session_start();
 
class verifylogin extends CI_Controller
{
 
   public  function __construct()
 		{
  				 parent::__construct();
   				 $this->load->model('user','',TRUE);
   				 $this->load->model('user','$id');
				 //$this->load->library('session');
				 $this->load->library('session');
			   					
 		}
 
    public function index()
 	{
  		 //This method will have the credentials validation
              $this->load->library('form_validation');
              $this->form_validation->set_rules('username', 'username', 'required');
              $this->form_validation->set_rules('password', 'password', 'required|callback_check_database');
  				//$this->form_validation->set_rules('username','username','trim|required');
   				//$this->form_validation->set_rules('password', 'password', 'trim|required');
				
           	 if($this->form_validation->run() == FALSE)
           	{
     		//Field validation failed.  User redirected to login page
                 $this->load->view('login_view');
          	 }
		   
        else
           {
           	$username = $this->input->post('username');
 			  // redirect('Home', 'refresh');
           $this->files($username);
		 //print_r($this->session->all_userdata());
                      }
 
    }
 
 	 public function check_database($password)
	 {
	 				
   					
   //Field validation succeeded.  Validate against database
   				$username = $this->input->post('username');
 					
   //query the database
   				$result = $this->user->login($username, $password);
 
  			 if($result)
   			{
    				
				//$this->load->view('home_view');
     		   return TRUE;
   		      }
   			else
       {
                 $this->form_validation->set_message('check_database', 'Invalid username or password');
          return false;
       }
     }
	 
	 
	 public function files($username)
		{
			$this->load->model('upload_model');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->upload_model->getalldata($username);//get all records from table
			$this->load->view('homeview2',$data);//view homepage
		}
	 
	 
	 
	}
?>