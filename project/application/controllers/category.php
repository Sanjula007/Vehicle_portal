<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	/*
		*view All Categories in load_category_view
	*/
	function index(){
		
		$this->load->model('category_model');
		
		$category=$this->category_model->allCategory();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
		
		
	}
	/*
		*To Add a Category to the site
	*/
	function categoryForm(){
		$categoryexists=null;
		$data['categoryexists']=$categoryexists;
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->view('category_view',$data);
		$this->editCategory();
		$this->load->view('footer');
		
		
	}
	/*
		*To Add a Category to the site
		*And vaildated the user input
	*/
	function addCategory(){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		$this->load->model('category_model');
		if ($this->form_validation->run() == FALSE||$this->category_model->isCategoryExists($this->input->post('name'))==true) {
			$categoryexists='Category already exists..!';
			$data['categoryexists']=$categoryexists;
			$this->load->helper('url');
			$this->load->view('header');
			$this->load->view('category_view',$data);
			$this->editCategory();
			$this->load->view('footer');
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
	/*
		*to show All Categories
		*to delete and update the categories
	*/
	function editCategory(){
		$this->load->model('category_model');
		$data=$this->category_model->showCategory();
		
		$senddata['category']=$data;
		
		$this->load->view('EditCategory_view',$senddata);
		
	}
	/*
		*to delete the Category
		*@param int $id - use to snd category id
	*/
	function deleteCategory($id){
		$this->load->model('category_model');
		$data=$this->category_model->getCategory($id);
		$pname=$data[0]->name;
		if($this->category_model->deleteCategory($id)){
			$this->category_model->updateCategoryOfAds('Other',$pname);
			$this->categoryForm();
		}
	}
	/*
		*to manage the categories category
		*@param int $id -use to send category id
		*@param string $categoryexists -use to send isthere a catrgort ture or false
	*/
	function showCategory( $id,  $categoryexists ){
		$this->load->helper('url');
		$this->load->view('header');
		$this->load->model('category_model');
		$data=$this->category_model->getCategory($id);
		
		$senddata['category']=$data;
		$senddata['categoryexists']=$categoryexists;
		$this->load->view('Updatecategory_view',$senddata);
		$this->editCategory();
		$this->load->view('footer');
	}
	/*
		*to update the category
		*@param int $id -use to send category id
	*/
	function updateCategory( $id ){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		$this->load->model('category_model');
		if ($this->form_validation->run() == FALSE||$this->category_model->isCategoryExists($this->input->post('name'))==true) {
			$categoryexists='Category already exists..!';
			
			$this->showCategory( $id, $categoryexists );
		}
		else{
			$data=$this->category_model->getCategory($id);
			$pname=$data[0]->name;
			$data = array(
				'name' => $this->input->post('name'),
				
				);
			$this->load->model('category_model');
			$check=$this->category_model->updateCategory($data,$id);
			$this->category_model->updateCategoryOfAds($this->input->post('name'),$pname);
			if($check==true){
				echo "<script>alert('Updated Successfully...! ');</script>";
				$this->categoryForm();
				
			}
		}
		
	}
	
}

