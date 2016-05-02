<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class View_bookmark extends CI_Controller 
{
    
	//this function is to load and view all the bookmarks added by the users
	//registered user is the person going t view all the bookmarks added by him  
    public function index() 
    {
    	$id = 4; //user id
    	$this->load->helper('url');
		$this->load->database();
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		
		$this->load->model("View_bookmark_model","BKs");
		//loading the bookmarks accordin to user Id
		$bookmarks=$this->BKs->all_bookmarks($id); 
		
		//passing the details retrieved from db to bookmarks array
		$data['bookmarks']=$bookmarks; 
		//showing all the bookmarks
		$this->load->view('viewBookmark_view',$data); 
		$this->load->view('footer');
    } //end of function
	
	
	public function delete_bookmark($bmID) 
	{
		$this->load->model('Edit_info_model');
		//calling deletebokmarks function and passes bmID as parameter
		$this->Edit_info_model->delete_bookmarks($bmID); 
		
		//show succes message after delete
		echo "<script>alert('Bookmark has been Successfully Deleted....!!!! ');</script>"; 
		//redirecting to all the bookmarks added by user
		//$this->load->controller('View_bookmark');
		$this->index();
		//redirect('View_bookmark');
	}
	
	
	
} //end of controller