
<h1>main hompage</h1>
<br>

	<h4>상품목록</h4>

<?php foreach ($salesList as $list ):?>
	<a href="/bumShop/order_controller/readItem?item_no=<?=$list->item_no ?>"> <?=$list->item_name ?> </a>
	<br>

<?php endforeach;?>