<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class company_check extends CI_Controller
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
        $this->check_button();
    	}	
    	
    	public function check_button()
		{
			if($this->input->post('Edit'))
			{
					$this->load->view('buser_login');
			}
			else if($this->input->post('send_mail'))
			{
				 $data["title"] = $this->input->post('email');
				 
				$this->load->view('send_email_bus',$data);
			}
			else if($this->input->post('comment')) 
			{
				$this->load->library('form_validation');
		     
		     $this->form_validation->set_rules('comment', 'comment', 'trim|required|max_length[300]');
			  $this->form_validation->set_rules('username', 'username', 'trim|required|max_length[30]');
				
				if($this->form_validation->run() == TRUE){
						
				$compname = $this->input->post('compname');
				$username = $this->input->post('username');
				$comment = $this->input->post('com');
				
				$this->add_comments($compname,$username,$comment);
				}
				else {
					
					$compname = $this->input->post('compname');
					$this->retrieve($compname);
				}	
				
			}
			else		
			{
				$compname = $this->input->post('compname');
				$this->view_comments($compname);
			}	
		}
		
		public function add_comments($compname,$username,$comment)
		{
			
					
				//	if($this->form_validation->run() == TRUE){	
				$data = array ( 'compname' => $compname,
							'username' =>$username,
							'comment'=>$comment,
						);
			$this->load->model('editcomp');//load update_model
			$this->editcomp->insertcomments($data);
			$this->view_comments($compname);
					//}	
				
		}
		
		
		public function view_comments($compname)
		{
			$this->load->model('editcomp');//load update_model
			$data['posts']=$this->editcomp->viewcomments($compname);
			//$this->load->view('individual_vieew',$data);
			
			$this->load->view('comments',$data);
			
			
		}
		
		public function retrieve($compname)
		{
			$this->load->model('search');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->search->retrieveuserdata($compname);//get all records from table
			$this->load->view('individual_vieew',$data);
		}	
		
		
	}
?>