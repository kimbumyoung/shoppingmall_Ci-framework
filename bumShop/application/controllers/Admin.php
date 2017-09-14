<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	

	function __construct(){
		
		parent:: __construct();
		$this->load->model('admin_model');
		
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('admin/index');
		$this->load->view('footer');
	}

	//상품 리스트
	public function getList(){
		
		$this->load->view('header');
		$list = $this->admin_model->getList(); //list 가져오기
/* 		var_dump($list); */
		$this->load->view('admin/itemList',array('list'=>$list));
		$this->load->view('footer');
	
	}
	
	//상품 등록
	public function registerItem(){
		
		if($_POST){ //$_post 변경 해야됨 
			
			$this->load->helper('url');
			$this->load->library('upload');
	 		$files = $_FILES;
			$cpt = count($_FILES['uploadfile']['name']); //파입 업로드 파일 count
			$fileArray = array(); //파일 경로 저장 array;
			
			//옵션
			$data = array(
					'item_name'         => $this->input->post('item_name',true),
					'item_price'        => (int)$this->input->post('item_price',true),  //String -> Int
					'item_category'     => $this->input->post('item_category',true),
					'item_detail'       => $this->input->post('item_detail',true),
			);
			
			
			//File Upload
			for($i=0; $i<$cpt; $i++)
			{
				$_FILES['uploadfile']['name']= $files['uploadfile']['name'][$i];
				$_FILES['uploadfile']['type']= $files['uploadfile']['type'][$i];
				$_FILES['uploadfile']['tmp_name']= $files['uploadfile']['tmp_name'][$i];
				$_FILES['uploadfile']['size']= $files['uploadfile']['size'][$i];
				
				$this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload('uploadfile'); //파일 업로드
				$fileArray[$i]  = $this->upload->data('file_name');  
			} 
			
			
			//업로드 파일명 추가
			$data['item_profileImage'] = $fileArray[0];
			$data['item_contentImage'] = $fileArray[1];
			
			
	
		/* 	for ($i=0; $i<count($_FILES['uploadfile']['name']); $i++){
				
				$file_name = $_FILES['uploadfile']['name'][$i]; //한글 깨짐 incov() 
				$tmp_name = $_FILES['uploadfile']['tmp_name'][$i];
				$des = $dir.$file_name;
				
				if(move_uploaded_file($tmp_name,$des)){
					$fileArray[$i] =$file_name;
				}else{
					echo '실패';
				}
			} */
			//File Upload
			
			
			
			$itemNo = $this->admin_model->registerItem($data);  //상품 등록 후 키값 return
			$options = $this->input->post('option'); 
			$this->admin_model->registerOption($itemNo,$options);//옵션 등록
			
			redirect('admin/getList');
			
			
		}else{
			
			$this->load->view('header');
			$this->load->view('admin/itemRegister');
			$this->load->view('footer');
		
		}
	}
	
	
	//ajax 상품 상세정보
	public function getItemDetail(){
		$item_no = $this->input->get('item_no');
		$detailInfo = $this->admin_model->getItemDetail($item_no); 
		echo json_encode($detailInfo); //json 형식으로 변환 후 리턴 
	}
	
	//ajax
	public function checkItemDisplay(){
		
		$display = $this->input->post('display'); //display check 값
		$item_no = $this->input->post('item_no'); //item no
		
		$this->admin_model->checkItemDisplay($item_no,$display);
		
		echo 'success';
		
	}
	
	//관리자 상품 수정 페이지  get
	public function getItemModify(){
		
		$item_no = $this->input->get('item_no',true);
		
		$data = $this->admin_model->getItemModify($item_no);
		
		$this->load->view('header');
		$this->load->view('admin/itemModify',array('modifyInfo'=>$data));
		$this->load->view('footer');
	}
	
	
	//관리자 상품 수정 post
	public function modifyItem() {
		
		$this->load->library('upload');
		$this->load->helper(array("file","url"));
		
		$dir = $_SERVER['DOCUMENT_ROOT'].'/bumShop/upload/';
		$item_no = $this->input->post('item_no');
		$data = array(	
					'item_name'   => $this->input->post('item_name'),
					'item_price'  => $this->input->post('item_price'),
					'item_detail' => $this->input->post('item_detail')
				);
		
		var_dump($data);
		
		//파일 수정
		if(($_FILES['item_profileImage']['name'])!=null){
			
			$path =$dir.$this->input->post('item_profileImageValue'); //파일 삭제를 위한 경로
			
			unlink($path); //파일 삭제
			
			$this->upload->initialize($this->set_upload_options());
			$this->upload->do_upload('item_profileImage'); //파일 업로드
		
			$data['item_profileImage'] = $this->upload->data('file_name'); //수정한 파일명 추가 
			
		}
		
		if(($_FILES['item_contentImage']['name'])!=null){
			$path = $dir.$this->input->post('item_contentImageValue'); //파일 삭제를 위한 경로
			
			unlink($path); //파일 삭제 
			
			$this->upload->initialize($this->set_upload_options());
			$this->upload->do_upload('item_profileImage'); //파일 업로드
			
			$data['item_contentImage'] = $this->upload->data('file_name'); //수정한 파일명 추가 
			//$data['item_contentImage']->$this->upload->data('file_name');
		}
		
		$this->admin_model->modifyItem($item_no,$data);
		
		redirect('admin/getList');
		
	}
	
	
	//ajax delete 
	public function deleteItem() {
		$item_no = $this->input->post('item_no');
		
		echo $item_no;
		
		$li = $this->admin_model->deleteItem($item_no);
		
		echo 'success';
		 
	}
	
	
	//업로드 파일 option 설정
	private function set_upload_options(){
		
		$config = array();
		
		$config['upload_path']   = $_SERVER['DOCUMENT_ROOT'].'/bumShop/upload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '0';
		$config['overwrite']     = FALSE; //flase 중복된 파일명은 뒤에 숫자 추가
		$config['encrypt_name'] = true; //파일명 암호화된 문자열로 변환   
		
		return $config;
	}
		
}
	
	
