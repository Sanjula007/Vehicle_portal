<?php
    
class Pending_Ads_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	public function allAds(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'pending');
		$query=$this->db->get();
			return $query->result();
	}
	
}
    
    
    
?>