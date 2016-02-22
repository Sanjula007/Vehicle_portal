<?php

class files_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	function uploadFile()
	{
		$adsid=5;
		$this->load->helper('url');
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$new_name = $adsid.'_pic';
		$config['file_name'] = $new_name;
		
		//$file = $_FILES['userfile']["name"];
		//$fileExt = end((explode(".", $file)));

		$this->load->library('upload', $config);
		
		if ( ! $this->files_model->uploadFile())
		{
			//$error = array('error' => $this->upload->display_errors());
			//$this->load->view('upload_view', $error);
			
			//return 'no_image';
		}
		else
		{
			//return $new_name;
		}
	}
	
		function do_upload($adsid)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '0';
		$config['max_height'] = '0';
		$config['remove_spaces'] = TRUE;
		$new_name = $adsid.'pic';
		$config['file_name'] = $new_name;
		$filename = $_FILES['file_upload']['name'];
		if($filename!=''){
			
			$files = glob('./uploads/'.$adsid.'pic'.'*'); 
     
			foreach ($files as $path) {
			if(file_exists($path)){
			unlink($path); 
	  }
         
	}
		}
		$this->load->library('upload');
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file_upload')) {
			if(!strcmp($this->upload->display_errors(),'You did not select a file to upload.')){	
				$error = array('error' => $this->upload->display_errors());
			
				echo $error['error'];
				
			}
			else{
				$this->load->model('EditAds_model');
				$imagedata= $this->EditAds_model->getImageInfo($adsid);
				$image=$imagedata[0]->image;
			}
		}
		else{
			$data_upload_files = $this->upload->data();
			
		
			$image = $data_upload_files['file_name'];
				
			
		}
			return $image;
	}
	function deleteFile($file){
    $files = glob('./uploads/'.$file.'*'); 
     
	foreach ($files as $path) {
      if(file_exists($path)){
		unlink($path); 
	  }
         
	}
       
}
	
}