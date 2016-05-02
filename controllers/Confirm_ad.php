<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Confirm_AD extends CI_Controller {
	
	
	
	function __construct() {
	parent::__construct();
	//$this->load->controller('PendingAds');
	//$this->load->model('confirm_model');
	}

     
    /*public function index() 
    {
    	//$this->load->database();
    	//$this->load->model('confirm_model');
    	$id=$vehicle[$i]->adID;
		$this->load->model('Confirm_model');
		$co = 'confi';
		$id=$vehicle[$i];
		$data = array(
		'adstatus' => $co
		);
		
		$this->Confirm_model->confirm($data);
		
	}*/
	
	public function update($data)
	{
		$this->load->model('Confirm_model');
		$this->Confirm_model->confirm($data);
		$this->load->model("FullAds_model");
		$car=$this->FullAds_model->adsinfo1($data);
		$data1['vehicle']=$car;
		//$this->load->view('PendingAds_view',$data1);
		$this->load->controller('PendingAds');
		$this->PendingAds->index();
		echo "<script>alert('Ad Successfully Confirmed....!!!! ');</script>";
		
		
		//$this->callback_PendingAds;
		
		}

	
	
}
	
?>