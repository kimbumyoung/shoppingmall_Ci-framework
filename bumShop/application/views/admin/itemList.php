
	<h1>상품 리스트</h1>
	
	<div class="itemListWrap">
		<table>
				<tr style="text-align: center;">
					<th>
						상품 이미지						
					</th>
					<th>
						상품명
					</th>
					<th>
						가격
					</th>
					<th>
						상품종류
					</th>
					<th>
						상품소개
					</th>
					<th>
						등록일
					</th>
					<th>
						옵션관리
					</th>
					<th>
						판매등록
					</th>
				</tr>
				
		
		<?php foreach ($list as $itemList):?>
			<tr style="text-align: center;">
				<td>
					<img src="/bumShop/upload/<?=$itemList->item_profileImage?>" style="width: 100px; height: 150px">
				</td>
				<td>
					<label><?=$itemList->item_name?></label>
				</td>
				<td>
					<label><?=$itemList->item_price?>원</label>
				</td>
				<td>
					<label><?=$itemList->item_category?></label>
				</td>
				<td>
					<label><?=$itemList->item_detail?></label>
				</td>
				<td>
					<label><?=$itemList->item_date?></label>
				</td>
				<td>
					<input type="hidden" class="item_no" value="<?=$itemList->item_no?>"/>	
					<button class="itemDetailBtn">옵션관리</button>
				</td>
				<td>
					<?php if($itemList->display):?>
						<input type="checkbox" name ="check" class="soldCheckbox" checked>
					<?php else:?>
						<input type="checkbox" name ="check" class="soldCheckbox" >
					<?php endif;?>
				</td>
				<td>
					<a href="/bumShop/admin/getItemModify?item_no=<?=$itemList->item_no?>">수정</a>
					<a href="" class="deleteBtn">삭제</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
	
		<div id ="popup_mask" ></div> <!-- 팝업 배경 DIV -->
			   
	    <div id="popupDiv"> <!-- 팝업창 -->
	        <button id="popCloseBtn">close</button>
	        <div class="popupContent">
	        
	        </div>
	    </div>
	        
	    
	</div>
	
	<script>
		$(document).ready(function(){

				//상세보기 버튼 클릭
				$(".itemDetailBtn").click(function(){
					
					var item_no = $(this).siblings().val();
					
					
					$.ajax({
			            url : "/bumShop/admin/getItemDetail",
			            type : "get",
			            data : {
			               item_no : item_no
			            },
			            dataType : "json",
			            success : function(result) {
				            
				            var str = "";
				            str += "<div>상품명:"+result[0].item_name+"</div>";
				            
							for(var val in result){
								str+="<div>size:"+result[val].item_size;
								str+=" color:"+result[val].item_color;
								str+=" stock:"+result[val].item_stock;
								str+="<button>수정</button> <button>삭제</button></div>"
							}
								str+="<a href=''>추가 </a> "

							 $("#popupDiv").css({
			                     "top": (($(window).height()-$("#popupDiv").outerHeight())/2+$(window).scrollTop())+"px",
			                     "left": (($(window).width()-$("#popupDiv").outerWidth())/2+$(window).scrollLeft())+"px"
			                     //팝업창을 가운데로 띄우기 위해 현재 화면의 가운데 값과 스크롤 값을 계산하여 팝업창 CSS 설정
			                  }); 
							
			                 $("#popup_mask").css("display","block"); //팝업 뒷배경 display block
			                 $("#popupDiv").css("display","block"); //팝업창 display block
			                 
			                 $("body").css("overflow","hidden");//body 스크롤바 없애기

							$(".popupContent").html(str);
							
			            }
			     	});
				});

				//상세보기팝업 Close 버튼 클릭
				 $("#popCloseBtn").click(function(event){
						$(".popupContent").empty();
			            $("#popup_mask").css("display","none"); //팝업창 뒷배경 display none
			            $("#popupDiv").css("display","none"); //팝업창 display none
			            $("body").css("overflow","auto");//body 스크롤바 생성
			        });

				//판패 체크 박스 
			      $(".soldCheckbox").change(function(){
				     	var checkState =$(this).is(":checked");
				     	var itemNo = $(this).parents().siblings().children(".item_no").val();

				     	console.log(checkState);
				     	console.log(itemNo);
				     	
			 	  		$.ajax({
				            url : "/bumShop/admin/checkItemDisplay",
				            type : "post",
				            data : {
				               display : checkState,
				               item_no : itemNo
				            },
				            dataType : "text",
				            success : function(result) {
								console.log(result);
					        }

			            }); 
				            
			     	});

			 //item delete
				$(".deleteBtn").click(function(event){
					event.preventDefault();
					var parent = $(this).parent().parent();
					var itemNo = $(this).parents().siblings().children(".item_no").val();
					parent.remove();
					$.ajax({
			            url : "/bumShop/admin/deleteItem",
			            type : "post",
			            data : {
			               item_no : itemNo
			            },
			            dataType : "text",
			            success : function(result) {
							if(result){
								console.log(parent);
							
								
							}
				        }

		            }); 

		            
			            
					
				});
			
					

		});


	</script>