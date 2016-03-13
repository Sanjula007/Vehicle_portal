<?php
class delete_model extends CI_Model{


 public function did_delete_row($username){
 // $this -> db -> where('fname', $username);
  //$this -> db -> delete('users');
  
  		//$username = $this->input->post('uname');

			$sql ="DELETE from users where fname = '{$username}' " ;
			$this->db->query($sql);
			
			redirect('Home');
	
			}
				
			
  //redirect('Home');
	
 
}
?> 