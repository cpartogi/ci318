<?php
class Login_model extends CI_Model 
{
	public function __construct()
    {
        $this->load->database();
    }
        
    public function ceklogin($username, $password)
    {	
    	$query = $this->db->get_where('users', array('username' => $username, 'password' => $password ));
    	return $query->row_array();
	}
}
?>