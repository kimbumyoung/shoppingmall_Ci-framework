<?php


class Order_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	function readItem($item_no){
		
		$sql = "select i.item_no,item_name,item_profileImage,item_detail,item_price,o.item_color,o.item_size from item i left outer join item_option o on i.item_no = o.item_no
			    where i.item_no = ".$item_no." and o.item_state=true";
		
		return $this->db->query($sql)->result();
		
	}
	
	
	
	
}