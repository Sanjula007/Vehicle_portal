<?php
class Forgot_Ctrl extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('forgot_model');
	}
function index(){
}

public function forget()
{
	if (isset($_GET['info'])) {
           $data['info'] = $_GET['info'];
          }
	if (isset($_GET['error'])) {
          $data['error'] = $_GET['error'];
          }
	
	$this->load->view('forgot_view');//,$data);
} 
	
}
?>