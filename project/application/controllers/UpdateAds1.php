<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class UpdateAds1 extends CI_Controller {
	
	
	
	function __construct() {
	parent::__construct();
	$this->load->model('insert_model');
	}

     
    public function index() 
    {
    	//$this->load->database();
    	$this->load->model('insert_model');
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('UpdateAds_view1');
		$this->load->view('footer');
		
	}
	
		
	function error()
	{
		//$this->load->database()
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$sel1 = $this->input->post('select_mod');
		$sel2 = $this->input->post('select');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['remove_spaces'] = TRUE;
		
		
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_upload')) {
    	$error = array('error' => $this->upload->display_errors());
    	echo $error['error'];
		}
		
		
		//$this->load->library('upload',$config);
		//$this->upload->do_upload('image');
		$data_upload_files = $this->upload->data();
		
		$image = $data_upload_files['full_path'];
		
		
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
		
		if ($this->form_validation->run() == FALSE) {
		$this->index();
		} else{
		echo "<script>alert('Form Submitted Successfully....!!!! ');</script>";

		/*$cat = $this->input->post('select_cat');
		$brand = $this->input->post('select_mod');
		$modName = $this->input->post('model_name');
		$yr = $this->input->post('model_year');
		$vCon = $this->input->post('select');
		$mile = $this->input->post('mileage');
		$transm = $this->input->post('trans');
		$fuel = $this->input->post('fuel');
		$des = $this->input->post('description');
		$pr = $this->input->post('price');
		$uN = $this->input->post('usr_name');
		$uE = $this->input->post('usr_email');
		$uP = $this->input->post('phone_num');
		$uA = $this->input->post('address');*/
		
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
		//'transmission' => $this->input->post('dmobile')
		
		//$this->load->model('insert_model');
		$this->insert_model->form_insert($data);
		//$this->insert_model->form_insert();
		$data1['message'] = 'Data Inserted Successfully. Your Ad will be Post in 48 hours.';
		//Loading View
		$this->load->view('header');
		$this->load->view('UpdateAds_view1',$data1);
		$this->load->view('footer');
		
		}
    }
	
	function select_validate1($sel1)
		{
		// 'none' is the first option that is default "brand*"
		if($sel1=="Brand*"){
		$this->form_validation->set_message('select_validate1', 'Please Select Your Model.');
		return false;
		} else{
		// User picked something.
		return true;
		}
		}
		
	function select_validate2($sel2)
		{
		
		if($sel2=="Condition"){
		$this->form_validation->set_message('select_validate2', 'Please Select Your Vehicle Condition.');
		return false;
		} else{
		// User picked something.
		return true;
		}
		}
		
	function select_validate3($sel3)
		{
		
		if($sel3=="Please Select"){
		$this->form_validation->set_message('select_validate3', 'Please Select Your Vehicle Category.');
		return false;
		} else{
		// User picked something.
		return true;
		}
		}
}