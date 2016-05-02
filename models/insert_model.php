<?php
class Insert_model extends CI_Model
{
		
	function __construct() 
	{
		parent::__construct();
	}
	
	//method to insert details of advertisement ginen by the user (insert query)
	function form_insert($data)
	{
		$this->db->insert('advertisements', $data);
	}
	
	//method to load the categories from db to drop down list
	function get_dropdown_list()
	{
		try
		{
			$return1[''] = "Please Select";
			$this->db->select("*");
			$this->db->from("category");
			$result = $this->db->get();
			$return = array();
		
			if($result->num_rows() > 0) 
			{
				foreach($result->result_array() as $row) 
				{
					$return[$row['name']] = $row['name'];
				}//end of foreach
			}//end of if statement
			
			return $return;
		}
		catch(Exception $ex)
		{
			return FALSE;
		}

	}//end of dropdown method
	
	//method to insert the bookmark details in to db (insert query)
	function insert_bookmark($data)
	{
		$this->db->insert('bookmarks',$data);
	}// end of method
	
	
	function insert_article($data)
	{
		$this->db->insert('articles',$data);
	}
	
	function insert_comment($data)
	{
		try
		{
			$this->db->insert('articlecomments', $data);
		}
		catch(Exception $ex)
		{
			echo "Connection Lost";
		}
	}//end of method
	
	function insert_ad_comment($data)
	{
		try
		{
			$this->db->insert('advertisementcomments', $data);
		}
		catch(Exception $ex)
		{
			echo "Connection Lost";
		}
	}//end of method
	
}//end of model
?>