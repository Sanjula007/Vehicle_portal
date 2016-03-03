<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Confirm_AD extends CI_Controller {
	
	
	
	function __construct() {
	parent::__construct();
	//$this->load->controller('PendingAds');
	//$this->load->model('confirm_model');
	}
	
	public function update($data) // data will hold the ad ID.
	{
		$this->load->model('Confirm_model');
		$this->Confirm_model->confirm($data); //the ad id will be passed to confirm function of confirm model
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