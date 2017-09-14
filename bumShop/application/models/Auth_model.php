<?php


class Auth_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	
	public function login($username,$password){
		
		$sql = "select username,displayname,admin_state from user 
				where username ='" . $username . "' and password ='" . $password . "'";
		
		$query = $this->db->query($sql);
		
		
		if($query->num_rows() > 0 ){ //회원일시
			return $query->row();
		}else{ 
			return false;
		}

	}
	
	public function signUp($userData){
		
		$this->db->insert('user',$userData);	
		
	}

}