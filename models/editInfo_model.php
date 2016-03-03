<?php

class EditInfo_model extends CI_Model{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	//this is the method to delete the bookmark (delete query)
	function deleteBookmarks($id){ //bookmark id has passed as parameter
			$this->load->database();
			$this->db->where('bookmarkID', $id);
			$this->db->delete('bookmarks'); 
			
			return true;
		} //end of delete bookmark method
	
	//this is the method to delete the feedback (delete query)
	function deleteFeedbacks($id){ //feedback id has passed as parameter
			$this->load->database();
			$this->db->where('fID', $id);
			$this->db->delete('feedback'); 
			
			return true;
		} //end of deletefeedback method
}