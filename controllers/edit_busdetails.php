<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class edit_busdetails extends CI_Controller
{
    public function __construct()
    	{
        parent::__construct();//Call the Controller constructor
        $this->load->helper(array('form','url'));
        //$this->load->library('session');
        $this->load->database();//loading database
       
    	}
    
   		public function index()
    	{
        
		$this->load->library('form_validation');
		
			$this->form_validation->set_rules('compname', 'compname', 'trim|required|min_length[6]|max_length[30]');// validating username should contain minimum 6 letters
        	$this->form_validation->set_rules('description', 'description', 'trim|required|min_length[10]|max_length[150]');// validating lastname should contain minimum 6 letters
        	
			$this->form_validation->set_rules('Tel', 'Tel', 'trim|required|min_length[10]|max_length[10]');//phone number should coontain 10 digits
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');//email validation
        	$this->form_validation->set_rules('address', 'address', 'trim|required|min_length[10]|max_length[150]');//phone number should coontain 10 digits
			$this->form_validation->set_rules('requirments', 'requirments', 'trim|required|min_length[3]|max_length[150]');//email validation
        
        
        		            $compname =trim($this->input->post('compname'));
			    			$description =trim($this->input->post('description'));
			   			    $Tel=trim($this->input->post('Tel'));
						   	$email=trim($this->input->post('email'));
							$address = trim($this->input->post('address'));
							$requirments = trim($this->input->post('requirments'));
								
				if ($this->form_validation->run() == FALSE)
        			{
        				$companyname=trim($this->input->post('compname'));
						$this->update_retrive($companyname);
            // fails
            		//$this->load->view('buser_update');
       			 }
       				 else
       				 {
       				 	$this->update_details($compname , $description, $Tel, $email,$address,$requirments);
						
					 }				
		}

		public function update_details($compname , $description, $Tel, $email ,$address,$requirments)
		{
			//declare $dd array
			
			
	        $dd = array(
					//'id' => $userid,
				'name' => $compname ,
						'description' => $description,
							'tel' => $Tel,
							'email' => $email,
							'address' => $address,
							'Requirements' => $requirments, 
												);
				$this->load->model('editcomp');//load update_model
				if(!$this->editcomp->update_details($compname ,$dd))
				
				{$this->load->view('busin_success');}
				 //echo "<script language=\"javascript\">alert('Updated successfully');</script>";
				else
					{echo "<script language=\"javascript\">alert('Updated successfully');</script>";}
			
			
			
		}
		
		public function update_retrive($companyname)
		{	$this->load->model('buser_model');
			$data['posts'] = $this->buser_model->update_retrive($companyname);
			$this->load->view('buser_update',$data);
		}




		}
?>