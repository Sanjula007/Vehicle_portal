<?php

class upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()

	{	$adsid=5;
    	$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model("EditAds_model");
		
		$adsdata=$this->EditAds_model->getAdsInfo($adsid);
		$ads['adsdata']=$adsdata;
		$this->load->view('header');
		$this->load->view('upload_view',$ads);
		$this->load->view('footer');
		//$this->load->view('upload_view', array('error' => ' '));
	}

	function do_upload($adsid)
	{
		$this->load->helper('url');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$new_name = $adsid;
		$config['file_name'] = $new_name;
		echo $new_name;
		
		//$file = $_FILES["userfile"]["name"];
		//$fileExt = end((explode(".", $file))); # extra () to prevent notice

//echo $fileExt;
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_view', $error);

		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());

			//$this->load->view('upload_success', $data);
		}
	}
	function deleteFiles($file){
    $files = glob('./images/'.$file.'*'); // get all file names
     // iterate files
	 foreach ($files as $path) {
      if(file_exists($path))
        unlink($path); // delete file
        //echo $file.'file deleted';
	 }
       
}
}
?>