
<?php
	if(isset($_GET['sub']) == false)
		$sub = 1;
	else
		$sub = $_GET['sub'];
	
	switch($sub)
	{
		case 1: //Liệt kê danh sách
			include('pages/product/list_product.php');
			break;
		case 2: //Xử lý xóa
			include('pages/product/delete_product.php');
			break;
		case 3: //Cập nhật
			include('pages/product/edit_product.php');
			break;
		case 4: //Thêm mới
			include('pages/product/add_product.php');
			break;
	}
?>