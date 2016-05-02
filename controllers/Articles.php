<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Articles extends CI_Controller {
     
    public function index() 
    {
    	$this->load->database();
    	$this->load->helper('url');
		$this->load->helper('text');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		
		//loading articles from database
		$this->load->model("Article_model","ARs"); 
		$articles=$this->ARs->all_articles();
		
		//passing loaded articles details to site_article array
		$data['site_articles']=$articles; 
		//showing all the feedbacks
		$this->load->view("Articles_view",$data);
		$this->load->view('footer');
    }
}