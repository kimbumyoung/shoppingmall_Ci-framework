

	<br>
	
	<form action="/bumShop/admin/modifyItem" method="post" enctype="multipart/form-data"> 
		<input type="hidden" name="item_no" value=<?=$modifyInfo->item_no?>>
		<table>
			<tr>
				<td>
					상품명
				</td>
				<td>
					<input type="text" name="item_name" value=<?=$modifyInfo->item_name?>>
				</td>
			 </tr>
			 <tr>
				<td>
					상품 가격 
				</td>
				<td>
					 <input type="text" name="item_price" value=<?=$modifyInfo->item_price?>>
				</td>
			 </tr>
			  <tr>
			  	<td>
			  		상품소개
			  	</td>
			  	<td>
			  		<input type="text" name="item_detail" value=<?=$modifyInfo->item_detail?>>
			  	</td>
			  </tr>
			   <tr>
				<td>
					상품 이미지
				</td>
				<td>
					 <input type="file" name="item_profileImage">
					 <input type="hidden" name="item_profileImageValue" value=<?=$modifyInfo->item_profileImage?>>
				</td>
			    </tr>
			    <tr>
					<td>
					상품 메인 이미지
					</td>
					<td>
					<input type="file" name="item_contentImage">
					 <input type="hidden" name="item_contentImageValue" value=<?=$modifyInfo->item_contentImage?>>
					</td>
			   </tr>
		</table>
			
		
			<br>
			
			<input type="submit" value="수정 완료">
	</form>
			<a href="/bumShop/admin/getList">수정 취소</a>

	<script>

		

	</script>
