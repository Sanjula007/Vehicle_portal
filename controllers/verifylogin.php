<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 	//session_start();
 
class verifylogin extends CI_Controller
{
 
    function __construct()
 		{
  				 parent::__construct();
   				 $this->load->model('user','',TRUE);
   				 $this->load->model('user','$id');
   
 		}
 
     function index()
 	{
   //This method will have the credentials validation
                 $this->load->library('form_validation');
                 $this->form_validation->set_rules('username', 'username', 'required');
                 $this->form_validation->set_rules('password', 'password', 'required|callback_check_database');
  /*username = $this->security->xss_clean($this->input->post('username'));
   $password = $this->security->xss_clean($this->input->post('password'));
    $this->db->where('username', $username);
    $this->db->where('password', $password);*/
   
            if($this->form_validation->run() == FALSE)
           {
     //Field validation failed.  User redirected to login page
                    $this->load->view('login_view');
           }
		   
        else
           {
     //Go to private area
            redirect('Home', 'refresh');
            }
 
    }
 
 	function check_database($password)
	 {
   					$this->load->library('session');
   //Field validation succeeded.  Validate against database
   				$username = $this->input->post('username');
 
   //query the database
   				$result = $this->user->login($username, $password);
 
  			 if($result)
   			{
    			 $sess_array = array();
     			foreach($result as $row)
     			{
     			  $sess_array = array(
        		 'id' => $row->id,
         		 'username' => $row->username,
        		 'logged_in'=> True
     			  );
				  
       			  $this->session->set_userdata( $sess_array);
	   //print_r($this->session->all_userdata());
	  				 redirect('login/Homeview1');
     			}
     		   return TRUE;
   		      }
   			else
       {
                 $this->form_validation->set_message('check_database', 'Invalid username or password');
          return false;
       }
     }

	}
?>