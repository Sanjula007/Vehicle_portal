<?php

class Fullads_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	
	public function adsinfo1($id){
		$this->load->database();
		$query = $this->db->query("select * from advertisements where adID ='".$id."'");
		
			return $query->result();
	}
}
?>