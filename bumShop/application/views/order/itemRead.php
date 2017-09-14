
<h1>Item Read</h1>

<div class="contentWrap">
	<div class="container"> 
	
		<div class="leftcon">
			
			<img src="/bumShop/upload/<?=$itemInfo[0]->item_profileImage ?>">
		
		</div>
		
		<div class="rightcon">
			
			<span class="spanrow">
				<span class="titleSpan"><?=$itemInfo[0]->item_name?></span>			
			</span>
			<span class="spanrow">
				<span class="contentSpan"><?=$itemInfo[0]->item_detail?></span>			
			</span>
		 
		 
		 	<table>
		 		<tr>
		 			<td>
		 				<span class="contentSpan">판매가격</span>	
		 			</td>
		 			<td>
		 				<span class="contentSpan"><?=$itemInfo[0]->item_price?></span>			
		 			</td>
		 		</tr>
		 		<tr>
		 			<td>
		 				<span class="contentSpan">적립금</span>	
		 			</td>
		 			<td>
		 				<span class="contentSpan">400</span>	
		 			</td>
		 		</tr>
		 		<tr>
		 			<td>
		 				<span class="contentSpan">색상</span>	
		 			</td>
		 			<td>
		 				<select>
		 					<option>--옵션 선택--</option>
		 					<?php foreach($itemInfo as $value):?>
		 					<option><?=$value->item_color?></option>
		 					<?php endforeach;?>
		 				</select>
		 			</td>
		 		</tr>
		 		<tr>
		 			<td>
		 				<span class="contentSpan">사이즈</span>	
		 			</td>
		 			<td>
		 				<select>
		 					<option>--옵션 선택--</option>
		 					<?php foreach($itemInfo as $value):?>
		 					<option><?=$value->item_size?></option>
		 					<?php endforeach;?>
		 				</select>
		 			</td>
		 		
		 		</tr>
		 	</table>
			<span class="spanrow">
			
				
			</span>
		</div>
		
		<div class="bottomcon"style="height: 500px;">
		
		</div>

	</div>


</div>

