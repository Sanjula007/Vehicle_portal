<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class search_controller extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();//Call the Controller constructor
        $this->load->helper(array('form','url'));
        //$this->load->library('session');
        $this->load->database();//loading database
        //$this->load->model('user_model');
    	}
    
   		public function index()
    	{
    		$this->load->library('form_validation');
            $this->form_validation->set_rules('search', 'search', 'required');
			
			if($this->form_validation->run() == TRUE)
       		{ 			//$this->load->view('business_users');
				$key= $this->input->post('search');
    			$this->search($key);			
			}
			else
    		{
    		     echo "Don't keep empty boxes!"; 
			}	
				
	}
		
			
		public function search($key)
		{
			$this->load->model('search');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->search->getuserdata($key);//get all records from table
			$this->load->view('individual_vieew',$data);
		}	
}		

?>