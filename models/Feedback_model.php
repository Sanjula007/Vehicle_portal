<?php
class Feedback_model extends CI_Model
{
    	public function _construct()
    	{
			parent::_construct();
		}
	
	//method to load all the feedbacks (select query)
		public function all_feedbacks()
		{
			try
			{
				$this->load->database();
				$this->db->select("*");
				$this->db->from("feedback");
				$this->db->order_by("cDate","DESC"); //sort by date. decending
				$query=$this->db->get();
				return $query->result();
			}
			catch(Exception $ex)
			{
				return FALSE;
			}
		}//end of method
   
}//end of model
?>