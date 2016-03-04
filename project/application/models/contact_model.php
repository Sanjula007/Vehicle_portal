<?php
class Contact_Model extends CI_Model{
// Function To Fetch All Students Record
function show_users(){
$query = $this->db->get('user_login');
$query_result = $query->result();
return $query_result;
}
// Function To Fetch Selected Student Record
function show_user_id($data){
$this->db->select('*');
$this->db->from('user_login');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student
function update_user_id1($id,$data){
$this->db->where('id', $id);
$this->db->update('user_login', $data);
}

function show_user_email($data){
$this->db->select('user_email');
$this->db->from('user_login');
$this->db->where('id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

}
?>