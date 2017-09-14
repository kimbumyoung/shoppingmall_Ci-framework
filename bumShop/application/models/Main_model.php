<?php


class Main_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	function getSalesList(){
		
		$sql = "select item_name,item_no from item where display = '1' ";
		
		return $this->db->query($sql)->result();
		
	}
	
	


}