<?php
/**
 * @author it14119804
 */
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
		
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		
		$this->load->view('load_category_view',$data);
		
		
	}
	/*
		*To Add a Category to the site
	*/
	function category_Form(){
		$categoryexists=null;
		$data['categoryexists']=$categoryexists;
		$this->load->helper('url');
		$this->load->view('header');
		$this->show_Category_view();
		$this->load->view('category_view',$data);
		$this->edit_Category();
		$this->load->view('footer');
		
		
	}
	/*
		*To Add a Category to the site
		*And vaildated the user input
	*/
	function add_Category(){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		$this->load->model('category_model');
		if ($this->form_validation->run() == FALSE||$this->category_model->is_Category_Exists($this->input->post('name'))==true) {
			if($this->category_model->is_Category_Exists($this->input->post('name'))==true){
			$categoryexists='Category already exists..!';
			}
			else{
				$categoryexists='.';
			}
			$data['categoryexists']=$categoryexists;
			$this->load->helper('url');
			$this->load->view('header');
			$this->show_Category_view();
			$this->load->view('category_view',$data);
			$this->edit_Category();
			$this->load->view('footer');
		}
		else{
			$data = array(
				'name' => $this->input->post('name'),
				
				);
			$this->load->model('category_model');
			$this->category_model->add_Category($data);
			echo "<script>alert('Category inserted Successfully....!!!! ');</script>";
			$this->category_Form();
			
		}
		
	}
	/*
		*to show All Categories
		*to delete and update the categories
	*/
	function edit_Category(){
		$this->load->model('category_model');
		$data=$this->category_model->show_Category();
		
		$senddata['category']=$data;
		
		$this->load->view('EditCategory_view',$senddata);
		
	}
	/*
		*to delete the Category
		*@param int $id - use to snd category id
	*/
	function delete_Category($id){
		$this->load->model('category_model');
		$data=$this->category_model->get_Category($id);
		$pname=$data[0]->name;
		if($this->category_model->delete_Category($id)){
			$this->category_model->update_Category_Of_Ads('Other',$pname);
			$this->category_Form();
		}
	}
	/*
		*to manage the categories category
		*@param int $id -use to send category id
		*@param string $categoryexists -use to send isthere a catrgort ture or false
	*/
	function show_Category( $id,  $categoryexists ){
		$this->load->helper('url');
		$this->load->view('header');
		$this->show_Category_view();
		$this->load->model('category_model');
		$data=$this->category_model->get_Category($id);
		
		$senddata['category']=$data;
		$senddata['categoryexists']=$categoryexists;
		$this->load->view('Updatecategory_view',$senddata);
		$this->edit_Category();
		$this->load->view('footer');
	}
	/*
		*to update the category
		*@param int $id -use to send category id
	*/
	function update_Category( $id ){
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'name', 'required|min_length[2]|max_length[15]|alpha_numeric_spaces');
		$this->load->model('category_model');
		if ($this->form_validation->run() == FALSE||$this->category_model->is_Category_Exists($this->input->post('name'))==true) {
			$categoryexists='Category already exists..!';
			
			$this->show_Category( $id, $categoryexists );
		}
		else{
			$data=$this->category_model->get_Category($id);
			$pname=$data[0]->name;
			$data = array(
				'name' => $this->input->post('name'),
				
				);
			$this->load->model('category_model');
			$check=$this->category_model->update_Category($data,$id);
			$this->category_model->update_Category_Of_Ads($this->input->post('name'),$pname);
			if($check==true){
				echo "<script>alert('Updated Successfully...! ');</script>";
				$this->category_Form();
				
			}
		}
		
	}
	
	/*
		*use to view all category in a view 
	*/
	public function show_Category_view(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('Load_category_view',$data);
		
		
	}
	
}

