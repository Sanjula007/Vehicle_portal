<?php
    
class Pending_ads_model extends CI_Model
{
	
	public function _construct()
	{
		parent::_construct();
	}
	
	
	public function all_ads()
	{
		try
		{
			$this->load->database();
			//$query = $this->db->query("select * from advertisements adstatus='confi'");
			$this->db->select("*");
			$this->db->from("advertisements");
			$this->db->where("adstatus",'pending');
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $ex)
		{
			return FALSE;
		}
	}
	
}
    
    
    
?>