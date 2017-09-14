

	<br>
	
	<form action="/bumShop/admin/registerItem" method="post" enctype="multipart/form-data"> 
	
		<table>
			<tr>
				<td>
					상품명
				</td>
				<td>
					<input type="text" name="item_name">
				</td>
			 </tr>
			 <tr>
				<td>
					상품 가격 
				</td>
				<td>
					 <input type="text" name="item_price">
				</td>
			 </tr>
			  <tr>
				<td>
					상품 카테고리
				</td>
				<td>
					 <select name="item_category" style="width: 100%"> 
					 	<option>바지</option>
						<option>상의</option>
						<option>모자</option>
						<option>신발</option>
					 </select>
				</td>
			  </tr>
			  <tr>
			  	<td>
			  		상품소개
			  	</td>
			  	<td>
			  		<input type="text" name="item_detail">
			  	</td>
			  </tr>
			   <tr>
				<td>
					상품 이미지
				</td>
				<td>
					 <input type="file" name="uploadfile[]">
				</td>
			   </tr>
			    <tr>
					<td>
					상품 메인 이미지
					</td>
					<td>
					<input type="file" name="uploadfile[]">
					</td>
			   </tr>
		</table>
			
			<div class="optionWrap">
				<div class="optionForm">
				    <label>사이즈</label><input type="text" name="option[0][item_size]">
			        <label>색상</label><input type="text" name="option[0][item_color]">
			        <label>재고</label><input type="text" name="option[0][item_stock]">
				</div>
			</div>
			<br>
			   <a href="#" id="addOption">추가</a>
					
			<input type="submit" value="등록">
	</form>
	
	

	<script>
	$(document).ready(function() {
		var index = 0;

		$("#addOption").click(function(event){
			event.preventDefault();
			
			index +=1;
			var form = "<div class='optionForm'><label>사이즈</label><input type='text' name='option["+index+"][item_size]'><label>색상 </label><input type='text' name='option["+index+"][item_color]'><label>재고 </label><input type='text' name='option["+index+"][item_stock]'></div>";
			$(".optionWrap").append(form);
			
		});
		
	});
		

	</script>
