<?php
Class Test_model extends  CI_Model {
	public function test(){
		// Query to check whether username already exist or not
//$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_login');
//$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
$query->result();

	}
}
?>