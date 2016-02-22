<?php

class EditAds_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	
	
	public function getAdsInfo($adsid){
		$this->load->database();
		$query = $this->db->query("select * from advertisements where adid ='".$adsid."'");
		
			return $query->result();
	}
	
	public function getImageInfo($adsid){
		$this->load->database();
		$query = $this->db->query("select image from advertisements where adid ='".$adsid."'");
		
			return $query->result();
	}
	
	function updateAds($id,$data){
			$this->load->database();
			$this->db->where('adID', intval($id));
			$this->db->update('advertisements', $data);
	}
	
	function deleteAds($id){
		try{
			$this->load->database();
			$this->db->where('adid', $id);
			$this->db->delete('advertisements'); 
			
			return true;
		}catch(Exception $e){
			
			return false;
		}
		
	}
	
	function uploadFile($id){
		if($_POST['submit']){
			
			$name= basename($_FILES['file_upload']['name']);
			$t_name= $_FILES['file_upload']['tmp_name'];
			$dir='Image';
			if(move_uploaded_file($t_name,$dir.'/'.$name))
			{
				echo 'done';
			}
			else{
				echo'filed';
				
			}
		}
		
	}
}
?>