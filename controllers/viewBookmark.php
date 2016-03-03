<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class viewBookmark extends CI_Controller {
    
	//this function is to load and view all the bookmarks added by the users
	//registered user is the person going t view all the bookmarks added by him  
    public function index() 
    {
    	$id = 4; //user id
    	$this->load->helper('url');
		$this->load->database();
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('header');
		
		$this->load->model("viewBookmark_model","BKs");
		$bookmarks=$this->BKs->allBookmarks($id); //loading the bookmarks accordin to user Id
		
		$data['bookmarks']=$bookmarks; //passing the details retrieved from db to bookmarks array
		$this->load->view('viewBookmark_view',$data); //showing all the bookmarks
		$this->load->view('footer');
    } //end of function
} //end of controller