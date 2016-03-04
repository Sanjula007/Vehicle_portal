<?php
class update_model extends CI_Model{
// Function To Fetch All Students Record
function show_users(){
$query = $this->db->get('admin_reg');
$query_result = $query->result();
return $query_result;
}
// Function To Fetch Selected Student Record
function show_user_id($data){
$this->db->select('*');
$this->db->from('admin_reg');
$this->db->where('AdminID', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
function update_user_id1($id,$data){
$this->db->where('AdminID', $id);
$this->db->update('admin_reg', $data);
}

function show_user_email($data){
$this->db->select('Email');
$this->db->from('admin_reg');
$this->db->where('AdminID', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}



}
?>