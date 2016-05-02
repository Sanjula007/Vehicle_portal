<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Add_new_ad extends CI_Controller 
{
	
	
	
	function __construct() {
	parent::__construct();
	$this->load->model('Insert_model');
	$time = time();
	}

     
    public function index() 
    {
    	//loading the view of inseet vehicle ad
    	$this->load->model('Insert_model');
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		//load the vehicle categories which are stored on the category database and pass them to dropdown list
		$data['categories'] = $this->Insert_model->get_dropdown_list();
		$this->load->view('Add_new_ad',$data);
		$this->load->view('footer');
		
	}
	
		
	function error()
	{
		//time() function returns the unix timestamp.
		$time = time();
		//$this->load->database();	
		//calling validation library
		$this->load->library('form_validation'); 
		//$sel1 variable contains the selected model of the vehicle
		$sel1 = $this->input->post('select_mod'); 
		//sel2 variable contains the selected vehicle condition
		$sel2 = $this->input->post('select');
		//this is the div class to show error messages
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>'); 
		
		//configuration details to upload images
		//upload image saving folder
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png|gif';
		$config['max_size'] = '2048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['remove_spaces'] = TRUE;
		//name will contain image along with unix time stamp retured by time function
		$new_name = 'image'.$time; 
		$config['file_name'] = $new_name;
		$filename = $_FILES['file_upload']['name'];
		
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		
		//method to upload the image and show errors of uploading images
		if (!$this->upload->do_upload('file_upload')) 
		{
    		$error = array('error' => $this->upload->display_errors());
    		echo $error['error'];
		}
		
		$data_upload_files = $this->upload->data();
		//image variable contains the uploaded image name as in uploads folder
		$image = $data_upload_files['file_name']; 
		
		//setting the validation rules and calling the validations for the desired fields of the form
		$this->form_validation->set_rules('select_cat', 'select_cat', 'required|callback_select_validate3');
		$this->form_validation->set_rules('select_mod', 'select_mod', 'required|callback_select_validate1');
		$this->form_validation->set_rules('model_name', 'Model', 'required|min_length[3]|max_length[15]');
		$this->form_validation->set_rules('model_year', 'Model Year', 'required|regex_match[/^[0-9]{4}$/]|greater_than[1850]|less_than[2016]');
		$this->form_validation->set_rules('select', 'select', 'required|callback_select_validate2');
		$this->form_validation->set_rules('mileage', 'Mileage', 'required|min_length[4]|max_length[8]|integer');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]');
		$this->form_validation->set_rules('price', 'Price', 'required|min_length[4]|max_length[12]|integer');
		$this->form_validation->set_rules('usr_name', 'Username', 'required|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('usr_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone_num', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[50]');
		
		if ($this->form_validation->run() == FALSE) 
		{
			//if the validation rules violates index method of Add_new_ad class will be loaded with error messages
			$this->index(); 
		} 
		else
		{
			echo "<script>alert('Form Submitted Successfully....!!!! ');</script>";

			//storing all the user entered values in to data array		
			$data = array(
			'category' => $this->input->post('select_cat'),
			'brand' => $this->input->post('select_mod'),
			'modelName' => $this->input->post('model_name'),
			'year' => $this->input->post('model_year'),
			'vCondition' => $this->input->post('select'),
			'mileage' => $this->input->post('mileage'),
			'transmission' => $this->input->post('trans'),
			'fuel' => $this->input->post('fuel'),
			'description' => $this->input->post('description'),
			'price' => $this->input->post('price'),
			'uName' => $this->input->post('usr_name'),
			'uEmail' => $this->input->post('usr_email'),
			'uPhone' => $this->input->post('phone_num'),
			'uAddress' => $this->input->post('address'),
			'image' => $image
			);
		
			$this->Insert_model->form_insert($data);
			$data['message'] = 'Data Inserted Successfully. Your Ad will be Post in 48 hours.';
			$data['categories'] = $this->Insert_model->get_dropdown_list();
			//Loading View
			$this->load->view('header');
			$this->load->view('right_coloumn');
			$this->load->view('Add_new_ad',$data);
			$this->load->view('footer');
		
		}//end of else
    }// end of error function
	
	//function for check wether the user select any vehicle brand
	//returns true if user selected something
	
	function select_validate1($sel1)
		{
			// 'none' is the first option that is default "brand*"
			if($sel1=="Brand*")
			{
				$this->form_validation->set_message('select_validate1', 'Please Select Your Model.');
				return FALSE;
				} 
			else
			{
			// User picked something.
				return TRUE;
			}
		}
	
	//function for check wether the user select vehicle condition
	//returns true if user selected something	
	
	function select_validate2($sel2)
		{
			// 'none' is the first option that is default "condition"
			if($sel2=="Condition")
			{
				$this->form_validation->set_message('select_validate2', 'Please Select Your Vehicle Condition.');
				return FALSE;
			} 
			else
			{
				// User picked something.
				return TRUE;
			}
		}
		
	function select_validate3($sel3)
		{
		
			if($sel3=="Please Select")
			{
				$this->form_validation->set_message('select_validate3', 'Please Select Your Vehicle Category.');
				return FALSE;
			} 
			else
			{
				// User picked something.
				return TRUE;
			}
		}
}