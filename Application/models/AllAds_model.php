<?php

class AllAds_model extends CI_Model{
	
	public function _construct(){
		
		parent::_construct();
			
	}
	
	
	
	public function allAds(){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements adstatus='confi'");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$query=$this->db->get();
			return $query->result();
	}
	
		public function my_Ads($page,$ads,$sort,$id){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements where adstatus='confi' limit ".(($page-1)*$ads).",".$ads." ");
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("userid",$id);
		//$start=($page-1)*$ads;
		//$this->db->limit($ads,$start);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	
	public function limit_Ads($page,$ads,$sort){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements where adstatus='confi' limit ".(($page-1)*$ads).",".$ads." ");
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$start=($page-1)*$ads;
		$this->db->limit($ads,$start);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	
	public function ads_count(){
		$this->load->database();
		$query = $this->db->query("select count(adid) as counts from advertisements where adstatus='confi'");
		
		foreach ($query->result() as $row)
		{		
			return $row->counts;
		}		
					
	}
	public function limit_Ads_category($page,$ads,$category,$sort){
		$this->load->database();
		//$query = $this->db->query("select * from advertisements where adstatus='confi' and category ='".$category."' limit ".(($page-1)*$ads).",".$ads." ");
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		$this->db->where("category",$category);
		$start=($page-1)*$ads;
		$this->db->limit($ads,$start);
		if($sort=='popularity'){
			$this->db->order_by('views','desc');

		}
		else if ($sort=='date'){
			
			$this->db->order_by('dateadded','desc');
		}
		$query=$this->db->get();
			return $query->result();
	}
	
	public function ads_count_category($category){
		$this->load->database();
		$query = $this->db->query("select count(adid) as counts from advertisements where adstatus='confi' and category ='".$category."'");
		
		foreach ($query->result() as $row)
		{		
			return $row->counts;
		}		
					
	}
	
	
	public function set_pagecount($all,$ads){
		
		
		return $all/$ads;
	}
	
	
	public function getSearchQuery($data){
		
		$this->load->database();
		
		$this->db->select("*");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		
		
		if(strcmp($data['category'],'All')){
			$this->db->where("category",$data['category']);
		}
		if(strcmp($data['condition'],'All')){
			$this->db->where("vCondition",$data['condition']);
		}
		if(strcmp($data['brand'],'All')){
			$this->db->like("lower(brand)",strtolower($data['brand']));
		}
		
		if(trim($data['model'])){
			$this->db->like("lower(modelName)",strtolower($data['model']));
		}
		if($data['max_price']!=0&&$data['min_price']!=0){
			$this->db->where('price >=', $data['min_price']);
			$this->db->where('price <=', $data['max_price']);
		}
		if($data['max_year']>=$data['min_year']){
			$this->db->where('year >=', $data['min_year']);
			$this->db->where('year <=', $data['max_year']);
		}
		else{
			$this->db->where('year <=', $data['min_year']);
			$this->db->where('year >=', $data['max_year']);
			
		}
		
		$query=$this->db->get();
		
		
			return $this->db->last_query();
		
	}
	
	
	public function getSearchCount($data){
		
		$this->load->database();
		
		$this->db->select("count(adid) as counts");
		$this->db->from("advertisements");
		$this->db->where("adstatus",'confi');
		
		
		if(strcmp($data['category'],'All')){
			$this->db->where("category",$data['category']);
		}
		if(strcmp($data['condition'],'All')){
			$this->db->where("vCondition",$data['condition']);
		}
		if(strcmp($data['brand'],'All')){
			$this->db->like("lower(brand)",strtolower($data['brand']));
		}
		
		if(trim($data['model'])){
			$this->db->like("lower(modelName)",strtolower($data['model']));
		}
		if($data['max_price']!=0&&$data['min_price']!=0){
			$this->db->where('price >=', $data['min_price']);
			$this->db->where('price <=', $data['max_price']);
		}
		if($data['max_year']>=$data['min_year']){
			$this->db->where('year >=', $data['min_year']);
			$this->db->where('year <=', $data['max_year']);
		}
		else{
			$this->db->where('year <=', $data['min_year']);
			$this->db->where('year >=', $data['max_year']);
			
		}
		
		$query=$this->db->get();
		
		
			foreach ($query->result() as $row)
		{		
			return $row->counts;
		}
		
	}
	
	function advancedSearch($data,$page,$ads){
		$querystr=$this->getSearchQuery($data)." limit ".(($page-1)*$ads).",".$ads." ";
		$query=$this->db->query($querystr);
		return $query->result();
	}
	function advancedSearchPage($squery,$page,$ads){
		$querystr=$squery." limit ".(($page-1)*$ads).",".$ads." ";
		$query=$this->db->query($querystr);
		return $query->result();
	}

}