<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	function index(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
		
		
	}
	
	function categoryForm(){
		
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('category_view');
		$this->editCategory();
		
		
	}
	
	function addCategory(){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE) {
		
			$this->categoryForm();
		}
		else{
			$data = array(
				'name' => $this->input->post('name'),
				
				);
			$this->load->model('category_model');
			$this->category_model->addCategory($data);
			echo "<script>alert('Category inserted Successfully....!!!! ');</script>";
			$this->categoryForm();
		}
		
	}
	
	function editCategory(){
		$this->load->model('category_model');
		$data=$this->category_model->showCategory();
		
		$senddata['category']=$data;
		
		$this->load->view('EditCategory_view',$senddata);
		
	}
	
	function deleteCategory($id){
		$this->load->model('category_model');
		if($this->category_model->deleteCategory($id)){
			$this->categoryForm();
		}
	}
	
	function showCategory($id){
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->model('category_model');
		$data=$this->category_model->getCategory($id);
		
		$senddata['category']=$data;
		$this->load->view('Updatecategory_view',$senddata);
		$this->editCategory();
	}
	
	function updateCategory($id){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		
		if ($this->form_validation->run() == FALSE) {
		
			$this->showCategory($id);
		}
		else{
			$data = array(
				'name' => $this->input->post('name'),
				
				);
			$this->load->model('category_model');
			$check=$this->category_model->updateCategory($data,$id);
			if($check==true){
				echo "<script>alert('Updated Successfully...! ');</script>";
				$this->categoryForm();
				
			}
		}
		
	}
	
}

