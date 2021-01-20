<?php
	
	if(isset($_GET["id"]) == true)
	{
		$id = $_GET["id"];
		$sql = "DELETE FROM `ebook`.`product` WHERE `Product_Id` = '$id'";
		DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL('../../ebook/admin/index.php?act=4');
?>
