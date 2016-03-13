<?php
class user_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function insertUser($data)
    {
        return $this->db->insert('users', $data);
    }
    
	public function exiting_data($name)
		{
			$sql = "Select fname from users where fname ='{$name}'";
			$result = $this->db->query($sql);
			$row = $result->row();
			return $row;
			//return ($result->num_rows() === 1 && $row->email) ? $row->fname : FALSE;;
			
		}
		
    //send verification email to user's email id
    
    //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }
}
?>