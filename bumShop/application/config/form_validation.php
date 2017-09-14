<?php
$config = array(
		'login' => array(
				array(
						'field' => 'username',
						'label' => '아이디',
						'rules' => 'required'
				),
				array(
						'field' => 'password',
						'label' => '비밀번호',
						'rules' => 'required|callback_checkUser'
				)
		),
		'signup' => array(
				array(
						'field' => 'username',
						'label' => '아이디',
						'rules' => 'required|callback_username_check|min_length[5]|max_length[12]' //아이디 중복 검사 및 5~12사이즈 
				),
				array(
						'field' => 'password',
						'label' => '비밀번호',
						'rules' => 'required|matches[passwordConfirm]' //패스워드 확인이랑 일치하는지 
				),
				array(
						'field' => 'passwordConfirm',
						'label' => '비밀번호 확인',
						'rules' => 'required'
				),
				array(
						'field' => 'email[]',
						'label' => '이메일',
						'rules' => 'required'
				)
		),
		'email' => array(
				array(
						'field' => 'emailaddress',
						'label' => 'EmailAddress',
						'rules' => 'required|valid_email'
				),
				array(
						'field' => 'name',
						'label' => 'Name',
						'rules' => 'required|alpha'
				),
				array(
						'field' => 'title',
						'label' => 'Title',
						'rules' => 'required'
				),
				array(
						'field' => 'message',
						'label' => 'MessageBody',
						'rules' => 'required'
				)
		)
);
