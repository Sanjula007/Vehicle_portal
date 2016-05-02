<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Add_comment extends CI_Controller {
     
    public function index($adid) 
    {
    	$this->load->model('Insert_model');
    	$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$data['advertisement_id']=$adid;
		$this->load->view('Add_comment_form',$data);
		$this->load->view('footer');
    }
	
	
	function comment($adid)
	{
		$this->load->model('Insert_model');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('cus_name', 'Name', 'required|min_length[5]|max_length[25]');
		$this->form_validation->set_rules('cus_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('cus_phone_num', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('cus_fb', 'Feedbak', 'required|min_length[10]|max_length[1000]');
		
		if ($this->form_validation->run() == FALSE) 
		{
			//$this->index($adid);
			$data1['sendcom']='none';
			$this->load->helper('text');
			$this->load->helper('string');
			$this->load->model('Insert_model');
			$this->load->library('form_validation');	
			$this->load->helper('url');
			//load the header view
			$this->load->view('header');
			//$this->load->view('Bookmark_btn');
			//load the Category
			$this->show_Category();
			// get data from database
			$this->load->model("FullAds_model");
			$car=$this->FullAds_model->ads_info1($adid);
			//set no of views
			$this->set_No_Of_Views($adid);
			//send data to view and view it
			$data1['vehicle']=$car;
			$ad_comments=$this->FullAds_model->ad_comments($adid);
			$data1['comments']=$ad_comments;
			$this->load->view('FullAds_view',$data1);
			$this->load->view('footer');
			
			
		} 
		else
		{
			echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
			
			//storing current date to cus_date variable
			$cus_date=date('Y-m-d'); 
			$data = array(
			'adUserName' => $this->input->post('cus_name'),
			'adUserEmail' => $this->input->post('cus_email'),
			'adUserPhone' => $this->input->post('cus_phone_num'),
			'adUserComment' => $this->input->post('cus_fb'),
			'adUserDate' => $cus_date,
			'advertisementID' => $adid
			);
		
			$this->Insert_model->insert_ad_comment($data);
			//$data1['message'] = '';
			//Loading View
			echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
			$this->goto_full_add($adid);
			//$this->load->controller('Full_article');
			//$this->Full_article->article_detail($artid);
			//$this->load->view('header');
			//$this->load->view('right_coloumn');
			//$this->load->view('contactus_view',$data1);
			//$new = current_url();
			//$this->load->view('footer');
		
		} //end of else statement
	}// end if function feedback
	
	public function goto_full_add($adid)
	{
		echo "<script>alert('Your Comment has been Successfully posted....!!!! ');</script>";
		redirect('FullAds/ads_info/'.$adid);
	}
	
	function show_Category(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('Load_category_view',$data);
		}
		
		function set_No_Of_Views( $adsid ){
		//load model
		$this->load->model('FullAds_model');
		//set of of views
		$this->FullAds_model->set_Views($adsid);
			
		}
}