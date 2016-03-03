<?php

class category_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	
	public function allCategory(){
		$this->load->database();
		$query = $this->db->query("select * from category");
		
			return $query->result();
	}
	
	public function addCategory($data){
		$this->load->database();
		$this->db->insert('category',$data);
		
		
	}
	public function showCategory(){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('category');
		$query=$this->db->get();
		
		return $query->result();
		
	}
	
	public function getCategory($id){
		$this->load->database();
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('id',$id);
		$query=$this->db->get();
		
		return $query->result();
		
	}
	
	function updateCategory($data,$id){
		try{
			$this->load->database();
			$this->db->where('id', $id);
			$this->db->update('category',$data); 
			
			return true;
		}catch(Exception $e){
			
			return false;
		}
	}
	
	function deleteCategory($id){
		try{
			$this->load->database();
			$this->db->where('id', $id);
			$this->db->delete('category'); 
			
			return true;
		}catch(Exception $e){
			
			return false;
		}
	}
}
?>