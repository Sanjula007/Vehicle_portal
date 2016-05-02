<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Contact_us extends CI_Controller 
{
	
	
	function __construct() {
	parent::__construct();
	$this->load->model('Contact_us_model');
	}
     
    public function index() 
    {
    	$this->load->model('Contact_us_model');
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$this->load->view('contactus_view');
		//$new = current_url();
		$this->load->view('footer');
    }
	
	
	function feedback()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('cus_name', 'Name', 'required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('cus_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('cus_phone_num', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('cus_fb', 'Feedbak', 'required|min_length[10]|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) 
		{
			$this->index();
		} 
		else
		{
			echo "<script>alert('Your Feedback has been Successfully Sent....!!!! ');</script>";
			
			//storing current date to cus_date variable
			$cus_date=date('Y-m-d'); 
			$data = array(
			'cName' => $this->input->post('cus_name'),
			'cEmail' => $this->input->post('cus_email'),
			'cPhone' => $this->input->post('cus_phone_num'),
			'cFeedback' => $this->input->post('cus_fb'),
			'cDate' => $cus_date
			);
		
			$this->Contact_us_model->form_insert($data);
			$data1['message'] = '';
			//Loading View
			$this->load->view('header');
			$this->load->view('right_coloumn');
			$this->load->view('contactus_view',$data1);
			//$new = current_url();
			$this->load->view('footer');
		
		} //end of else statement
	}// end if function feedback
}// end of controller contact us