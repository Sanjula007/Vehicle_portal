<?php
class View_bookmark_model extends CI_Model
{
    	public function _construct()
    	{
			parent::_construct();
		}
	
	//method to load all the bookmarks added by perticular user (select query)
	//user id is passed as parameter
	public function all_bookmarks($cusID)
	{
		try
		{
			$this->load->database();
			$this->db->select("*");
			$this->db->from("bookmarks");
			$this->db->where("userID", $cusID);
			//sort by date. decending
			$this->db->order_by("dateAdded","DESC"); 
			$query=$this->db->get();
			return $query->result();
		}
		catch(Exception $ex)
		{
			return FALSE;
		}
	}// end of method
    
}//end of model
?>