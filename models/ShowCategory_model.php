<?php
    class ShowCategory_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	public function allAds1(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'C');
		$query=$this->db->get();
			return $query->result();
	}
	
		public function allAds2(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'M');
		$query=$this->db->get();
			return $query->result();
	}
		
	public function allAds3(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'V');
		$query=$this->db->get();
			return $query->result();
	}
			
	public function allAds4(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'B');
		$query=$this->db->get();
			return $query->result();
	}
				
	public function allAds5(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'T');
		$query=$this->db->get();
			return $query->result();
	}
					
	public function allAds6(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'H');
		$query=$this->db->get();
			return $query->result();
	}
						
	public function allAds7(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'P');
		$query=$this->db->get();
			return $query->result();
	}
							
	public function allAds8(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",'W');
		$query=$this->db->get();
			return $query->result();
	}
								
								
}
?>