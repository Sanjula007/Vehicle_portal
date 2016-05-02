<?php

class Edit_info_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	//this is the method to delete the bookmark (delete query)
	function delete_bookmarks($id)
	{ //bookmark id has passed as parameter
			try
			{
				$this->load->database();
				$this->db->where('bookmarkID', $id);
				$this->db->delete('bookmarks'); 
				return TRUE;
			}
			catch(Exception $ex)
			{
				echo "";
				return FALSE;
			}
				
	} //end of delete bookmark method
	
	//this is the method to delete the feedback (delete query)
	function delete_feedbacks($id)
	{ //feedback id has passed as parameter
			try
			{
				$this->load->database();
				$this->db->where('fID', $id);
				$this->db->delete('feedback'); 
				return TRUE;
			}
			catch(Exception $ex)
			{
				return FALSE;
			}
	} //end of deletefeedback method
	
	//this is the method to delete the article (delete query)
	//farticle id has passed as parameter
	function delete_articles($id)
	{
			$this->load->database();
			$query = $this->db->query("select * from articles where artID = '".$id."'");
			foreach ($query->result() as $row)
			{
				$image_name = $row->art_image;
				$this->delete_article_image($image_name);
			}
			$this->delete_article_comments($id);
			$this->load->database();
			$this->db->where('artID', $id);
			$this->db->delete('articles'); 
			return TRUE;
	} //end of deletefeedback method
	
	function delete_article_image($name)
	{
		$path = './uploads/'.$name;
		
		if(file_exists($path))
			{
				chmod('./uploads/'.$name, 0755 );
				unlink($path); 
	  		}
		
	}
	
	function delete_article_comments($id)
	{ //feedback id has passed as parameter
			try
			{
				$this->load->database();
				$this->db->where('articleID', $id);
				$this->db->delete('articlecomments'); 
				return TRUE;
			}
			catch(Exception $ex)
			{
				return FALSE;
			}
	}
}