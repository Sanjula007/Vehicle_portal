<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
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
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }


/*	public function view_profile(){
		
		//$username = $this->input->post('username');
		
		 //$result['h'] = $this->user->viewprofile($username);
		 	   
   		//$this->load->view('select_view', $result);
		 $this->load->database();  
         //load the model  
         $this->load->model('user');  
         //load the method of model  
         $data['h']=$this->select->viewprofile($username); 
         //return the data in view  
         $this->load->view('select_view', $data); 
				
		
		
	}
	*/
	
	public function update_retrive()
	{
	$username = $this->input->post('username');
	$this->load->model("user");
	$d=$this->user->update_retrive($username);
	$data['posts'] = $d;
	$this->load->view('select_view',$data);
	}
	
	
	


	}
?>