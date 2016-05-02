<?php
class Contact_us_model extends CI_Model
{
		
	function __construct() 
	{
	parent::__construct();
	}
	//function to insert details of the feedbacks
	function form_insert($data)
	{
		try
		{
			$this->db->insert('feedback', $data);
		}
		catch(Exception $ex)
		{
			echo "Connection Lost";
		}
	}//end of method
	
}// end of model
?>