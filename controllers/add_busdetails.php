<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_busdetails extends CI_Controller
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
        $this->addcomp_details();
    	}
		
		
		
		public function addcomp_details()
		{
			$this->form_validation->set_rules('compname', 'compname', 'trim|required|min_length[6]|max_length[30]');// validating username should contain minimum 6 letters
        	$this->form_validation->set_rules('description', 'description', 'trim|required|min_length[10]|max_length[90]');// validating lastname should contain minimum 6 letters
        	
			$this->form_validation->set_rules('Tel', 'Tel', 'trim|required|min_length[10]|max_length[10]');//phone number should coontain 10 digits
			$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');//email validation
        	$this->form_validation->set_rules('address', 'address', 'trim|required|min_length[10]|max_length[100]');//phone number should coontain 10 digits
			$this->form_validation->set_rules('requirments', 'requirments', 'trim|required|min_length[3]|max_length[80]');//email validation
        
        	
								
				$filename='picture';
				 if ($this->form_validation->run() == FALSE)
        			{
            // fails
            		$this->load->view('business');
       			 }
       				 else
       				 {
							$config['upload_path'] ='file/';
							$config['allowed_types'] ='gif|jpg|png';
							$config['max_size'] =1024 * 8;
							$config['encrypt_name'] = true;
			
							$this->load->library('upload', $config);
			
						if(!$this->upload->do_upload($filename)){
							$status="error";
							$msg = $this->upload->display_errors('','');
				}
				else
				{
					$this->load->model('business_model');
					$data= $this->upload->data();
					$file_id=$this->business_model->insert_file($data['file_name'],$_POST['compname'],$_POST['description'],$_POST['Tel'],$_POST['email'],$_POST['address'],$_POST['requirments']);
					if(!$file_id)
					{
							echo"<script language=\"javascript\">alert('Unsuccessfully in Registering prrocess');</script>";
							 $this->load->view('business');
																}
					else
					{
							echo"<script language=\"javascript\">alert('Successfully Registered!');</script>";
							$this->load->view('business');
					}
				}
			 
					 }
			
		}

		public function view()
		{
			$this->load->model('business_model');//load upload_model
				//$this->load->view('homeview2');	
			 $data['posts'] = $this->business_model->getalldata();//get all records from table
			$this->load->view('business_users',$data);
		}

		public function selectview()
		{
			$name= $this->input->post('cname');
			$this->load->model('business_model');//load upload_model
				//$this->load->view('homeview2');	
			$data['posts'] = $this->business_model->getuserdata($name);//get all records from table
			$this->load->view('individual_vieew',$data);
		}


		}
?>