<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	
	function __construct(){
		
		parent:: __construct();
		$this->load->model('main_model');
	
	}

	public function index()
	{

		$this->load->view('header');
	 	$salesList = $this->main_model->getSalesList();
	 /* 	$this->layout->setLayout('welcome_message','salesList',$salesList); */
		$this->load->view('welcome_message',array('salesList'=>$salesList)); 
		$this->load->view('footer');
	}
/* 	public function getSalesList(){
		
		
		
	} */
}
