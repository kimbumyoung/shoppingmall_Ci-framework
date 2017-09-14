<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_Layout extends CI_Layout {
	
	public function __construct(){
		parent::__construct();
		
	}
	
	public function setLayout($path,$key,$value){
		
		
		$this->load->view('header');
		$this->load->view($path,array($key=>$value));
		$this->load->view('footer');
		
	}
	
}