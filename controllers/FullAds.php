

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FullAds extends CI_Controller {
	public $dataStr;
	public $url21;
	public function _construct(){
		
		parent::_construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('insert_model');
		//$this->load->library('session');
	}
	
	/*public function index(){
		$mapp=8;
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->view('categories');
		//$this->load->view('body');
		$this->load->view('categories');
		$this->load->model("Ads");
		$car=$this->Ads->allcars();
		//$count=$this->Ads->ads_count();
		$data['carss']=$car;
		//$data['count']=$count;
		$this->load->view("body",$data);
		$data1['pages']=$this->Ads->set_pagecount($mapp);
		$this->load->view('AdsPages_view',$data1);
	}*/
	

public function adsinfo($data){
		$this->load->helper('text');
		$this->load->helper('string');
		//$this->load->controller('AllAds');
		//$this->AllAds->showCategory();
		
		$this->load->database();
		$this->load->helper('url');
		$this->load->model('insert_model');
	
		$this->load->helper('url');
		$this->load->view('header');
		//$this->load->controller('AllAds');
		//$this->AllAds->showCategory();
		$this->load->view('panel');
		
		//$this->load->view('categories');
		$this->load->view('Bookmark_btn');
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->adsinfo1($data);
		$data1['vehicle']=$car;
		
		//$this->load->view('Bookmark_btn');
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
		
		
    }
	

// this function is to get the current url and save to db according to user favorites
public function bookmarking($data){ //parameter data holds the current ad url.
		$this->load->helper('text');
		$this->load->database();
		$this->load->model('insert_model');

		$strBookmark = $this->input->post('bkmark'); //user given name to identify the bookmark
		$addedDate = date("Y-m-d H:i:s"); //adding date of the bookmark
		$url = $data; //parameter details are passed to $url variable
		$id = 4; // logged in user id
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('bkmark', 'Bookmark Name', 'required|callback_validateString');
		
		if ($this->form_validation->run() == FALSE) {
			echo "<script>alert('You Have To Provide a Valid Name For Bookmark ');</script>";
			$this->adsinfo($data);
		} // end of if statement
		
		else{
			//passing bookmark details to data1 array
			$data1 = array(
			'bookmarkName' => $strBookmark,
			'bookmark' => $url,
			'userID' => $id,
			'dateAdded' => $addedDate
			);
			
			
			$this->insert_model->insertBookmark($data1); //calling model function to insert details
			echo "<script>alert('Your Bookmark Successfully Added....!!!! ');</script>";
			//$data['message'] = "success";
			$this->adsinfo($data); //redirecting
			
		} //end of else
	} //end of bookmarking function

	//function to check whether the user entered something or not
	public function validateString($strBookmark)
		{
			// 'none' is the first option that is default "brand*"
			if(strlen(trim($strBookmark))==0 && $strBookmark == " "){
				return false;
				$this->form_validation->set_message('validateString', 'You Have To Provide a Valid Name For Bookmark');
			} 
			else{
			//$this->form_validation->set_message('bkmark', 'You Have To Provide a Valid Name For Bookmark');
				return true;
			}
		}


public function adsinfo1($data){
	
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('panel');
		//$this->load->controller('AllAds');
		//$this->AllAds->showCategory();
		
		//$this->load->view('categories');
		
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->adsinfo1($data);
		$data1['vehicle']=$car;
		$this->load->view('confirm',$data1);
		$this->load->view('FullAds_view',$data1);
		$this->load->view('footer');
    }
		


}





