<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Full_article extends CI_Controller {
     
    public function index() 
    {
    	$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$this->load->view('Full_article_view');
		$this->load->view('footer');
    }
	
	public function article_detail($data)
	{
		$this->load->database();
		$this->load->helper('text');
		$this->load->helper('string');
		$this->load->database();
		$this->load->helper('url');
	
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('right_coloumn');
		$this->load->view('Bookmark_btn');
		$this->load->model("Article_model");
		$article_single=$this->Article_model->single_full_article($data);
		$article_comments=$this->Article_model->article_comments($data);
		$data1['full_article']=$article_single;
		$data1['comments']=$article_comments;
		
		
		$this->load->view('Full_article_view',$data1);
		$this->load->view('footer');
		
		
    }
}