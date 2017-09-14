<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_controller extends CI_Controller {
	
	
	function __construct(){
		parent:: __construct();
		$this->load->model('order_model');
	}
	
	public function index()
	{
		
	}
	public function readItem(){
		
		$item_no = $this->input->get('item_no',true);
		$itemInfo = $this->order_model->readItem($item_no);
		$this->load->view('header');
		$this->load->view('order/itemRead',array('itemInfo'=>$itemInfo));
		$this->load->view('footer');
		
	}
	
}