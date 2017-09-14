

	<h1>로그인 페이지</h1>

	<form action="/bumShop/auth/login" method="post">
	
		아이디: <input type="text" name="username" value=<?=set_value('username'); ?>><br>
		 	<?php echo form_error('username'); ?>
		패스워드: <input type="password" name="password" value=<?=set_value('password'); ?>><br>
		 	<?php echo form_error('password'); ?>
		 <?php if(isset($err)) echo $err ?>		
		<input type="submit" value="로그인">	
	</form>
	
	<br>
	
	<a href="/bumShop/auth/signUp">회원가입</a>

