<?php
    class ViewBookmark_model extends CI_Model
    {
    	public function _construct()
    	{
		parent::_construct();
		}
	
	//method to load all the bookmarks added by perticular user (select query)
	//user id is passed as parameter
	public function allBookmarks($cusID){
		$this->load->database();
				
		$this->db->select("*");
		$this->db->from("bookmarks");
		$this->db->where("userID", $cusID);
		$this->db->order_by("dateAdded","DESC"); //sort by date. decending
		$query=$this->db->get();
			return $query->result();
	}// end of method
    
}//end of model
?>