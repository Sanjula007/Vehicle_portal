<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @author it14119804
 */
class UpdateAds extends CI_Controller {
	
	
	
	function __construct() {
	parent::__construct();
	
	}

     
    public function index() 
    {
    	
	
		
	}
	/*
		*load the update advertisment view
		@param integer $adid - advertisement id
	*/
	function update_Ad($adsid){
			
    	$this->load->helper('url');
		$this->load->helper('form');
		//load the model
		$this->load->model("EditAds_model");
		//get the Adversiment data
		$adsdata=$this->EditAds_model->get_Ads_Info($adsid);
		$ads['adsdata']=$adsdata;
    	$this->load->helper('url');
		$this->load->helper('form');
		//load the view
		$this->load->view('header');
		$this->load->view('usersidepanel_view');
		$this->load->view('UpdateAds_view',$ads);
		$this->load->view('footer');
		
	}
	/*
		*delete an advertisement by id given
		*@param int$ id -use to get advertisment id to ta function
	*/
	function delete_Ads($id){
		
		//delete the data from database
		$this->load->model("EditAds_model");
		$check=$this->EditAds_model->delete_Ads($id);
		
		//delete the image of the ads from server
		if($check==true){
		$this->load->model('files_model');
		$this->files_model->delete_File($id.'pic');
		}
		redirect('/AllAds/view_myads/1', 'refresh');
		
		
	}
	
	/*
		*vaildate the user inputs
		*update the advertisment
		*@param int $adsid -use to get advertisment id to function
	*/	
	function error($adsid)
	{
		
		$this->load->helper('url');;	
		$this->load->library('form_validation');
		$sel1 = $this->input->post('select_mod');
		$sel2 = $this->input->post('select');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		
		
		
		//vaildate the user inputs 
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[5]');				//	validate the description	
		$this->form_validation->set_rules('price', 'Price', 'required|min_length[4]|max_length[12]|integer');	//	vaildate the price
		$this->form_validation->set_rules('usr_name', 'Username', 'required|min_length[4]|max_length[15]');		//	vaildate the contect name
		$this->form_validation->set_rules('usr_email', 'Email', 'required|valid_email');						//	vaildate the email
		$this->form_validation->set_rules('phone_num', 'Contact No.', 'required|regex_match[/^[0-9]{10}$/]');	//	vaildate the phone number`
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[5]|max_length[50]');		//	vaildate the Address
		
		
		//if vaildations are flase
		if ($this->form_validation->run() == FALSE) {
		$this->updateAd($adsid);
		} 
		//if vaildations are ture update the Adversiment
		else{
		
		
		//load the model
		$this->load->model('files_model');
		//upload the image to the upload dir
		$image= $this->files_model->do_upload($adsid);
		
		//Add data to data array to send to model
		$data = array(
		'description' => $this->input->post('description'),
		'price' => $this->input->post('price'),
		'uName' => $this->input->post('usr_name'),
		'uEmail' => $this->input->post('usr_email'),
		'uPhone' => $this->input->post('phone_num'),
		'uAddress' => $this->input->post('address'),
		'image' => $image
		);
		
		//load the model 
		$this->load->model('EditAds_model');
		$this->EditAds_model->update_Ads($adsid,$data);
		
		//show the message 
		echo "<script>alert('Updated Successfully....!!!! ');</script>";
		
		//Loading Adversiment view
		redirect('/FullAds/ads_info/'.$adsid, 'refresh');
		
		
		
		}
    
	
	}
	
	/*
	function changeToFullAds($id){
		
		$this->load->controller('Fullads');
	}
	*/

}