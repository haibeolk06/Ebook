<?php
	if(isset($_GET['sub']) == false)
		$sub = 1;
	else
		$sub = $_GET['sub'];
	
	switch($sub)
	{
		case 1: //Liệt kê danh sách
			include('pages/purchase/list_purchase.php');
			break;
		case 2: //Xử lý xóa
			include('pages/purchase/delete_purchase.php');
			break;
		case 3: //Cập nhật
			include('pages/purchase/edit_purchase.php');
			break;
		case 4: //Thêm mới
			include('pages/purchase/add_purchase.php');
		case 5:
			include('pages/purchase/view_purchasedetail.php');
			break;
	}
?>