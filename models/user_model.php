<?php
class user_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();        // Call the Model constructor
	}
    
    function insertUser($data)
    {
        return $this->db->insert('users', $data);	    //insert into user table
		
    }
    //to check whether username or firstname exists or not
	public function exiting_data($name)
	{
			$sql = "Select fname from users where fname ='{$name}'"; //select fname from table users where username == fname attribute
			$result = $this->db->query($sql);//execute the query
			$row = $result->row();//count no of rows
			return $row;
			//return ($result->num_rows() === 1 && $row->email) ? $row->fname : FALSE;;
	}
		
     //activate user account
    function verifyEmailID($key)
    {
        $data = array('status' => 1);
        $this->db->where('md5(email)', $key);
        return $this->db->update('users', $data);
    }
}
?>