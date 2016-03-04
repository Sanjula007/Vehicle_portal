<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class delete extends CI_Controller {
 
 function __construct(){
	parent::__construct();
	$this->load->model('delete_model');
	}
 
 
 
 public function delete_row() {
 	
		//if(isset($_POST['uname']) && !empty($_POST['uname'])){
			
			
		$username = $this->input->post('uname');
		print_r($username);
	   //$this->load->model("delete_model");
      //  $this->delete_model->did_delete_row($username);

       
  
					
		//	$this->load->view('deleteAccount', array('error'=> 'Email address not registererd'));
			
			
		
	
	 }
 	}
?>