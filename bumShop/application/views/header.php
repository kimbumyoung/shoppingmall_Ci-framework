<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>bumShop</title>
	<script src="//code.jquery.com/jquery.min.js"></script>
	


<style>
	body {
		height: 100%;
		width: 100%;
		margin: 0px;
	}

	.main_wrap {
			height: 100%;
		}

	/* .header_wrap {
		width: 100%;
		
	}
	
	.header_first {
		height: 30px;
		background: black;
		color: white;
	}
	.header_second{
		height: 120px;
		background: white;
		color: black;
		border-bottom: 1px solid black;
	}
 
	.header_wrap a {
 		color: white;
	}
	 */
 	a {
		text-decoration: none;
	} 
	
	input {
		border-radius: 2px;
	}

/* 	.itemListWrap {
		width: 0%;
		margin: auto;
	} */



	tr {
		border-bottom: 1px solid black
	}
	

 	#popupDiv {  /* 팝업창 css */
    top : 0px;
    position: absolute;
    background: white;
    width: 500px;
    height: 500px;
    display: none; 
    }
    
    #popup_mask { /* 팝업 배경 css */
        position: fixed;
        width: 100%;
        height: 1000px;
        top: 0px;
        left: 0px;
         display: none; 
         background-color:#000;
         opacity: 0.8;
    }
    
/*     form validation css  */
    .txt_error {
    	color: #e01c1c;
    }
    
    
    
/*     form validation css  */
    
    
    
    
/*     item read page */
    .contentWrap{
    	min-width: 1100px;
    	height: 100%;
    	position: relative;
    	
    }
    
    
    .container {
    	width: 1280px;
    	margin: 0 auto;
    	padding: 8px 10px 0;
    	position: relative;
    }
    
    
    .leftcon {
    	position: relative;
    	float: left;
    /* 	min-height: 500px; */
    	width: 700px;
    }
    .leftcon img {
    	width: 600px;
    	height: 500px;
    
    }
    .rightcon {
    	position: relative;
    	float: right;
    	width: 472px;
    }
    .spanrow{
   		display: block;
    	padding-top: 8px;
    }
    .titleSpan {
    	font-weight: 700;
    	font-size: 20px;
    }
    .contentSpan {
        line-height: 18px;
   		font-size: 14px;
    	color: #757575;
    }
    .bottomcon {
    	clear: both;
    }
    
/*     item read page */
    
</style>



</head>
<body>

	<div id="main_wrap">

		<div class="header_wrap">
		
			<div class="header_first">
				<a href="/bumShop/welcome">Home</a>
				<?php 
					if(@$this->session->userdata['logged_in'] == TRUE){
						
				?>
						<label><?php echo $this->session->userdata['displayname']?> 님 환영합니다.</label>
						
						<a href="/bumShop/auth/logout">로그아웃</a>
				
				<?php
						if(@$this->session->userdata['admin_state'] == TRUE ){
				?>
							<a href="/bumShop/admin">관리자 페이지</a>
				<?php
						}
					}else{
				?>	
							<a href="/bumShop/auth/loginForm">로그인</a>
							<a href="/bumShop/auth/signUp">회원가입</a>
							
				<?php 
					}
				?>
				
							<a href="#">주문조회</a>
							<a href="#">장바구니</a>
							<a href="#">마이페이지</a>
							<a href="#">공지사항</a>
			</div>
			<div class="header_second">
			
			</div>
			
		</div>

