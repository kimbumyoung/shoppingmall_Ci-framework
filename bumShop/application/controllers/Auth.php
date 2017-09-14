<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	

	function __construct(){
		parent:: __construct();
		$this->load->model('auth_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		
		
		
	}
	
	
	public function loginForm(){
		
		$this->load->view('header');
		$this->load->view('auth/login');
		$this->load->view('footer');
		
		
	}
	
	//로그인
	public function login(){
		
 	
		//cofig에 form_validation.php 'login' 호출 
		//username , password null이면 login view 리로드 
		$this->form_validation->set_error_delimiters('<p class="txt_error">','</p>');
		$this->form_validation->set_rules('username', '아이디', 'trim|required');
		$this->form_validation->set_rules('password', '비밀번호','trim|required');
		$this->form_validation->set_message('required','%s를 입력 해주세요');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('auth/login');
			$this->load->view('footer');
			
			/*  */
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->auth_model->login($username, $password);
			
			if($result){ //로그인 성공
				
				$session_data = array(
						'username'    => $result->username,
						'displayname' => $result->displayname,
						'admin_state' => $result->admin_state,
						'logged_in'   => true
				);
				
				$this->session->set_userdata($session_data); //세션 등록
				
				redirect('welcome');
				
			}else{ //로그인 실패
				
				$errorMessage = "<p class='txt_error'>아이디 또는 비밀번호를 잘못 입력하셨습니다</p>";
				$this->load->view('header');
				$this->load->view('auth/login',array('err'=>$errorMessage));
				$this->load->view('footer');
			} 
		}
	}
		
	//회원인지 아닌지 체크 
	public function checkUser($username, $password){
		
		
	}
	
	//로그아웃
	public function logout(){
		$this->load->helper('url'); 

		$this->session->sess_destroy(); //세션 삭제
		
		redirect('welcome'); 
	}
	
	//회원가입
	public function signUp(){

		if($_POST){
			
			$this->load->helper('url'); 
			$address = $this->input->post('address');
			$email = $this->input->post('email');
			$phonenumber= $this->input->post('phonenumber');
			
			$userData = array(
					
					'username'=>    $this->input->post('username'),
					'password'=>    $this->input->post('password'),
					'displayname'=> $this->input->post('displayname'),
					'address'=>     $address[0] . '/' . $address[1] . '/' . $address[2],
					'email'=>       $email[0] . '@' . $email[1],
					'phonenumber'=> $phonenumber[0] . '-' . $phonenumber[1] . '-' . '-' . $phonenumber[2]
					
			);
			

			$this->auth_model->signUp($userData);
			redirect('auth/login');
			
		}else{
			
			$this->load->view('header');
			$this->load->view('auth/signUp');
			$this->load->view('footer');
			
		}
			
		
	}
	
	
}