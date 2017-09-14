<?php


class Admin_model extends CI_Model {
	
	function __construct(){
		parent:: __construct();
		$this->load->database();
	}
	
	public function registerItem($data){
		$this->db->insert('item', $data);
		$itemNo = $this->db->insert_id();
		return $itemNo;
	}
	
	public function registerOption($item_no,$options){
		foreach ($options as $option){
			$this->db->set('item_no',$item_no,false);
			$this->db->insert('item_option',$option);
		}
	}
	
	public function getList(){
	/* 	$sql = 'SELECT a.item_no, a.item_name, b.item_size from item a join item_option b on a.item_no = b.item_no '; */
		$sql = "SELECT *from item";
		
		return $this->db->query($sql)->result();
	}
	
	public function getItemDetail($item_no){
		
		$sql = "select a.item_name,b.item_size,b.item_color,b.item_stock,b.item_state  from item a join item_option b on a.item_no = b.item_no where b.item_no =" . $item_no;
		return  $this->db->query($sql)->result();
		
	}
	public function checkItemDisplay($item_no,$display){
		
		$sql = "update item set display =" . $display . " where item_no = " . $item_no;

		$this->db->query($sql);
	}
	
	public function getItemModify($item_no){
			
		$sql = "select item_no, item_name, item_price, item_category, item_detail, item_profileImage,item_contentImage from item where item_no =".$item_no;
		
		return $this->db->query($sql)->row();
				
		
	}
		
	public function getItemOptionModify($item_no){
		
		$sql = "select option_no, item_no, item_size, item_stock, item_color, item_state from item_option where item_no =".$item_no;
		
		return $this->db->query($sql)->result();
				
	}
	
	public function modifyItem($item_no,$data){
		
		 $this->db->where('item_no', $item_no);
		 $this->db->update('item', $data);  
		
	}
	
	public function deleteItem($item_no) {
		
		$sql1 = 'delete from item where item_no ='.$item_no; 
		$sql2 = 'delete from item_option where item_no ='.$item_no;
		
		$this->db->query($sql1);
		$this->db->query($sql2);
		
	}
	
	
	
}