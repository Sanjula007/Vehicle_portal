<?php
class Article_model extends CI_Model
{
    	public function _construct()
    	{
			parent::_construct();
		}
	
	//method to load all the articles (select query)
		public function all_articles()
		{
			try
			{
				$this->load->database();
				$this->db->select("*");
				$this->db->from("articles");
				$this->db->order_by("postDate","DESC"); //sort by date. decending
				$query=$this->db->get();
				return $query->result();
			}
			catch(Exception $ex)
			{
				return FALSE;
			}
		}//end of method
		
		
		public function single_full_article($id){
		$this->load->database();
		$query = $this->db->query("select * from articles where artID ='".$id."'");
		
			return $query->result();
	}
		
		public function article_comments($id)
		{
			$this->load->database();
			$query = $this->db->query("select * from articlecomments where articleID ='".$id."'");
		
			return $query->result();
			
		}
   
}//end of model
?>