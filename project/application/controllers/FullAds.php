<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */

class FullAds extends CI_Controller {
	public $tmapp=8;
	public function _construct(){
		
		parent::_construct();
			
	}
	
	public function index(){
		$this->load->library('form_validation');	
		$this->load->helper('url');
		$this->load->view('header');
		$this->show_Category();
		$this->load->model("Ads");
		$car=$this->Ads->allAds();
		$data['carss']=$car;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($this->mapp);
		$this->load->view('AdsPages_view',$data1);
	}
	
	/*
		*adsinfo function for show All information of the advetisments
		**@param int $data use to send advetisment id
	*/
	public function ads_info( $data ){
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->model('Insert_model');
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->ads_info1($data);
		//set no of views
		$this->set_No_Of_Views($data);
		//send data to view and view it
		$data1['vehicle']=$car;
		$ad_comments=$this->FullAds_model->ad_comments($data);
		$data1['comments']=$ad_comments;
		$this->load->view('Bookmark_btn');
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
	}
	/*
		*use to view all category ina view 
	*/
	function show_Category(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('Load_category_view',$data);
		
		
	}
	
	
	/*
		*setNoOfViews function to set no Of Views from one when ad is loaded 
		*@param int $adsid -use to send advertisment id to function
	*/
	function set_No_Of_Views( $adsid ){
		//load model
		$this->load->model('FullAds_model');
		//set of of views
		$this->FullAds_model->set_Views($adsid);
			
	}
	
	/*
		*user can report ads usering this function validate the user input insert input to reportad table
		
		*@param int $adsid -use to send advertisment id to function
	*/
	public function report_ad($data){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('remail', 'remail', 'required|valid_email');
		
		$this->form_validation->set_rules('message', 'message', 'required');
		
		if ($this->form_validation->run() == FALSE) {
		$data1['report']='none';
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->ads_info1($data);
		//set no of views
		$this->set_No_Of_Views($data);
		//send data to view and view it
		$data1['vehicle']=$car;
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
		
		
		}
		else{
			$insertdata = array(
				'adID'=>$data,
				'reason'=>$this->input->post('reason'),
				'message'=>$this->input->post('message'),
				'email'=>$this->input->post('remail')
				);
			$this->load->model("FullAds_model");
			$status=$this->FullAds_model->report_ad($insertdata);
			if($status){
				echo "<script>alert('Reported advertisment Successfully....!!!! ');</script>";
				$this->load->helper('url');
				redirect('/FullAds/ads_info/'.$data, 'refresh');
				
			}
			else{
				$data1['report']='none';
				$this->load->library('form_validation');	
				$this->load->helper('url');
				//load the header view
				$this->load->view('header');
				//load the Category
				$this->show_Category();
				// get data from database
				$this->load->model("FullAds_model");
				$car=$this->FullAds_model->ads_info1($data);
				//set no of views
				$this->set_No_Of_Views($data);
				//send data to view and view it
				$data1['vehicle']=$car;
				$this->load->view('FullAds_view',$data1);
				$this->load->view('footer');
				echo "<script>alert('Unable to report the advertisment....!!!! ');</script>";
			}
			
		}
		
	}
	
	
	/*
		*user can can contact the advertisment owner by email 
		*user can give his email,name,meassage and phone. input will vaildated
		*send email to the advertisment owner 
		
		*@param int $data -use to send advertisment id to function
	*/
	public function contect_adowner_email( $data ){
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('emessage', 'emessage', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('phone', 'phone', 'required|regex_match[/^[0-9]{10}$/]');
		if ($this->form_validation->run() == FALSE) {
		$data1['sendmail']='none';
		$this->load->library('form_validation');	
		$this->load->helper('url');
		//load the header view
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		// get data from database
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->ads_info1($data);
		//set no of views
		$this->set_No_Of_Views($data);
		//send data to view and view it
		$data1['vehicle']=$car;
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
		
		
		}
		else{
			$sendemail="Dear User,\n\n".
						$this->input->post('name')." like to contect you about your advertisment.\n".
						site_url('FullAds/ads_info/'. $data)."\n".
						"Name -".$this->input->post('name')."\n".
						"phone -".$this->input->post('phone')."\n".
						"Email -".$this->input->post('email')."\n".
						"message -".$this->input->post('emessage')."\n\n".
						'Thank you';
			$to_email=$this->input->post('toemail');
			$this->load->model("Newsletter_model");
			$retrunmsg=$this->Newsletter_model->send_Email( $to_email, "To contact about Advertisment", $sendemail );
			echo "<script>alert('".$retrunmsg."');</script>";
			redirect('/FullAds/ads_info/'.$data, 'refresh');
		}
		
	}
	
	
	// this function is to get the current url and save to db according to user favorites
	//parameter data holds the current ad url.
	
	public function bookmarking($data)
	{ 
		$this->load->helper('text');
		$this->load->database();
		$this->load->model('Insert_model');

		//user given name to identify the bookmark
		$strBookmark = $this->input->post('bkmark'); 
		//adding date of the bookmark
		$addedDate = date("Y-m-d H:i:s"); 
		//parameter details are passed to $url variable
		$url = $data; 
		// logged in user id
		$id = 4; 
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('bkmark', 'Bookmark Name', 'required|callback_validate_string');
		
		if ($this->form_validation->run() == FALSE) 
		{
			echo "<script>alert('You Have To Provide a Valid Name For Bookmark ');</script>";
			$this->ads_info($data);
		} // end of if statement
		
		else
		{
			//passing bookmark details to data1 array
			$data1 = array(
			'bookmarkName' => $strBookmark,
			'bookmark' => $url,
			'userID' => $id,
			'dateAdded' => $addedDate
			);
			
			
			//calling model function to insert details
			$this->Insert_model->insert_bookmark($data1); 
			echo "<script>alert('Your Bookmark Successfully Added....!!!! ');</script>";
			//$this->redirect_to_all_bkmrk();
			redirect('View_bookmark/index');
			//$data['message'] = "success";
			//redirecting
			//$this->ads_info($data);
			 
			
			
		} //end of else
	} //end of bookmarking function
	
		public function redirect_to_all_bkmrk()
		{
			//$this->load->library('../controllers/View_bookmark');
			$this->load->controller('View_bookmark');
				//$this->View_bookmark->index();
		}

	//function to check whether the user entered something or not
		public function validate_string($strBookmark)
		{
			// 'none' is the first option that is default "brand*"
			if(strlen(trim($strBookmark))==0 && $strBookmark === " ")
			{
				return FALSE;
				$this->form_validation->set_message('validateString', 'You Have To Provide a Valid Name For Bookmark');
			} 
			else
			{
				//$this->form_validation->set_message('bkmark', 'You Have To Provide a Valid Name For Bookmark');
				return TRUE;
			}
		}

}