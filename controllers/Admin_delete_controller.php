<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_delete_controller extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();//Call the Controller constructor
        $this->load->helper(array('form','url'));
        $this->load->database();//loading database
        //$this->load->model('user_model');
    	}
    
   		public function index()
    	{
        $this->view_requests();
    	}	
    	
    	
		
		
		public function view_requests()
		{
			$this->load->model('Admin_delete_model');//load update_model
			$data['posts']=$this->Admin_delete_model->viewdelete_requests();
			//$this->load->view('individual_vieew',$data);
			
			$this->load->view('admin_delete_view',$data);
			
			
		}
		
		public function checkbox_delete()
		{
			$fname = $this->input->post('fname');
			$userid = $this->input->post('userid');
			$checked = $this->input->post('mycheck');
           // foreach($Request as $value){
           	if($checked == 1){
           		 echo '<script type="text/javascript">alert("Do you want delete?")</script>';
            	$this->load->model('Admin_delete_model');
            	$this->Admin_delete_model->delete_request($userid);
				  	$this->load->model('delete_model');
            	$this->delete_model->delete($fname);
				
				//$this->load->view('admin_delete_view');
				redirect('Admin_delete_controller/view_requests');
            }
			else
			{
				
			redirect('Admin_delete_controller/view_requests');
			echo '<script type="text/javascript">alert("Mark your option")</script>';
			
			
			}	
			
			
		}
		
		
		
	}
?>