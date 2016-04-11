<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 
class businessuser extends CI_Controller
{
 
   public  function __construct()
 		{
  				 parent::__construct();
   				 $this->load->model('buser_model','',TRUE);
   				 $this->load->model('buser_model','$id');
				 //$this->load->library('session');
				 $this->load->library('session');
			   					
 		}
 
    public function index()
 	{
  		 //This method will have the credentials validation
              $this->load->library('form_validation');
              $this->form_validation->set_rules('compname', 'compname', 'required');
              $this->form_validation->set_rules('password', 'password', 'required|callback_check_database');
  				//$this->form_validation->set_rules('username','username','trim|required');
   				//$this->form_validation->set_rules('password', 'password', 'trim|required');
				
           	 if($this->form_validation->run() == FALSE)
           	{
     		//Field validation failed.  User redirected to login page
                 $this->load->view('buser_login');
          	 }
		   
        else
           {
           	$companyname = $this->input->post('compname');
 			  // redirect('Home', 'refresh');
           $this->update_retrive($companyname);
		 //  print_r($this->session->all_userdata());
                      }
 
    }
 
 	 public function check_database($password)
	 {
	 				
   							
   //query the database
   				$result = $this->buser_model->userlogin($password);
 
  			 if($result)
   			{
    				
				//$this->load->view('home_view');
     		   return TRUE;
   		      }
   			else
       {
                 $this->form_validation->set_message('check_database', 'Invalid  password');
          return false;
       }
     }
	 
	public function update_retrive($companyname)
		{	//$username = $this->input->post('username');//print_r($username);
			//$this->load->model('update_model');
			//$d=$this->user->update_retrive($username);
			$data['posts'] = $this->buser_model->update_retrive($companyname);
			$this->load->view('buser_update',$data);
		}
	 

	
	}
?>