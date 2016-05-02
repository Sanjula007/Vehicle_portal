<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */
class Poll extends CI_Controller {
     
	// constructor
	public function _construct(){
		
		parent::_construct();
		$this->load->helper('url');
		$this->load->library('session');
		
			
	}
	public  function index(){
		 
		 
		 
	}
	/*
		*show the add topic View
	*/
	public function add_topic(){
		$this->checkuser->is_Admin_login();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->view("header");
		$this->load->helper('form');
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_add_topic_view");
		$this->load->view('footer');
		
	}
	/*
		*validate the user inserted details
		*insert data to database
		*call to add_choices if data valid
	*/
	public function validate_topic(){
		$this->checkuser->is_Admin_login();
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('topic', 'topic', 'required|min_length[2]|max_length[50]|alpha_numeric_spaces');
		$this->form_validation->set_rules('description', 'description', 'required|min_length[2]|max_length[100]|alpha_numeric_spaces');
		$this->form_validation->set_rules('choices', 'choices', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->add_topic();
			
			//$categoryexists='Category already exists..!';
			//$data['categoryexists']=$categoryexists;
			//$this->load->helper('url');
			//$this->load->view('header');
			//$this->load->view('category_view',$data);
			//$this->edit_Category();
			//$this->load->view('footer');
		}
		else{
			
			$topic=$this->input->post('topic');
			$des=$this->input->post('description');
			$choices=$this->input->post('choices');
			
			$this->load->model('poll_model');
			$tid=$this->poll_model->set_topic($choices,$des,$topic);
			$this->add_choices($tid,$choices,$des,$topic);
			echo "<script>alert('topic Successfully added....!!!! ');</script>";
			//$this->category_Form();
			
		}
		
	}
	/*
		*view the poll_add_choices_View view 
		*
		
		*@param interger $tid -topic id
		*@param	integer $choice - number of chocies
		*@param	string $des -description ablur the poll topic 
		*@param	string $topic -topic of the poll
		
	*/
	public function add_choices($tid,$choices,$des,$topic){
		//check admin loged in
		$this->checkuser->is_Admin_login();
		
		$this->load->helper('url');
		$this->load->library('session');
		
		$this->load->helper('form');
		$data['tid']=$tid;
		$data['choices']=$choices;
		$data['des']=$des;
		$data['topic']=$topic;
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_add_choices_view",$data);
		$this->load->view('footer');
		
		
	}
	/*
		
		*validate the poll chocies 
		*chocies are saved in database
		
		*@param integer $tid - poll id
		*@param integer $chocies -no of chocies
		
	*/
	public function validate_choices($tid,$choices){
		//check admin loged in
		$this->checkuser->is_Admin_login();
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		
		for($a=1;$a<=$choices;$a++){
		$this->form_validation->set_rules("choice-".$a, "choice-".$a, 'required|min_length[1]|max_length[50]|alpha_numeric_spaces');
		}
		
		if ($this->form_validation->run() == FALSE) {
			$des='rr';
			$topic='ee';
			$this->add_choices($tid,$choices,$des,$topic);
			
			//$categoryexists='Category already exists..!';
			//$data['categoryexists']=$categoryexists;
			//$this->load->helper('url');
			//$this->load->view('header');
			//$this->load->view('category_view',$data);
			//$this->edit_Category();
			//$this->load->view('footer');
		}
		else{
			for($a=1;$a<=$choices;$a++){
				$data["choice-".$a]=$this->input->post("choice-".$a );
			}
			
			
			
			$this->load->model('poll_model');
			$this->poll_model->set_choices($tid,$choices,$data);
			//$this->add_choices($tid,$choices,$des,$topic);
			echo "<script>alert('poll Successfully Created....!!!! ');</script>";
			//$this->category_Form();
			$this->poll_result($tid);
			
		}
		
	}
	/*
		*show all polls to user
		*poll topic and description only shown
		*link to the full poll deatails
	*/
	
	public  function All_polls(){
		$this->load->model('poll_model');
		$data['poll']=$this->poll_model->get_all_topics();
		//load the views
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_All_view",$data);
		$this->load->view('footer');
		
		
	}
	
	/*
		* show the poll details user can vote to poll
	*/
	public function show_poll($id){
		$this->load->model('poll_model');
		$data['id']=$id;
		$data['poll']=$this->poll_model->get_topic($id);
		$data['poll_choice']=$this->poll_model->get_poll($id);
		//load the views
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_vote_view",$data);
		$this->load->view('footer');
		
	}
	/*
		*check user already vote to the poll
		*save the vote in database
		@param integer $tid - poll id
		
	*/
	public function vote_poll($tid){
		
		$cid=$this->input->post("choice" );
		if($this->already_voted($tid)){
			echo "<script>alert('you have Already voted for this poll....!!!! ');</script>";
			$this->poll_result($tid);
			
		}
		else{
			$this->load->model('poll_model');
			$this->poll_model->add_vote($tid,$cid,$_SERVER['REMOTE_ADDR']);
			$this->poll_result($tid);
		}
	}
	/*
		*check user already vote to the poll
		*voted user get by ip address		
		@param integer $tid - poll id
		
	*/
	private function already_voted($tid){
		
		$this->load->model('poll_model');
		return $this->poll_model->check_vote($_SERVER['REMOTE_ADDR'],$tid);
		
	}
	/*
		*user can see the poll result
		*result are shown in bar chart		
		@param integer $tid - poll id
		
	*/
	public function poll_result($tid){
		
		$this->load->model('poll_model');
		$data['poll_result']=$this->poll_model->get_poll_resutls($tid);
		$data['poll']=$this->poll_model->get_topic($tid);
		$data['poll_count']=$this->poll_model->get_poll_resutls_count($tid);
		
		//load the views
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view('Poll_Views/Poll_result_view',$data);
		$this->load->view('footer');
	}
	/*
		*use to view all category in a view 
	*/
	public function show_Category(){
		//load the category model
		$this->load->model('category_model');
		//get All Categories
		$category=$this->category_model->all_Category();
		$data['category']=$category;
		//send categories to view and load it
		$this->load->view('Load_category_view',$data);
		
		
	} 
	
	/*
		*use to delete the poll by poll id given
		*poll ,poll choices and results are deleted by this function
		*@param interger $tid -poll id
	*/
	public function delete_poll($tid){
		//check admin loged in
		$this->checkuser->is_Admin_login();
		
		
		$this->load->model('poll_model');
		if($this->poll_model->delete_poll($tid)){
			
			echo "<script>alert('Poll Successfully Deleted....!!!! ');</script>";
		}
		else{
			echo "<script>alert(' Unable to Delete Poll... ');</script>";
			
		}
		$data['poll']=$this->poll_model->get_all_topics();
		//load the views
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_Delete_view",$data);
		$this->load->view('footer');
	}
	/*
		*to view all polls in web
		*to delete the poll 
	*/
	public  function Manage_polls(){
		//check admin loged in
		$this->checkuser->is_Admin_login();
		
		$this->load->model('poll_model');
		$data['poll']=$this->poll_model->get_all_topics();
		//load the views
		$this->load->view('header');
		//load the Category
		$this->show_Category();
		$this->load->view("Poll_Views/Poll_Delete_view",$data);
		$this->load->view('footer');
		
		
	}

}