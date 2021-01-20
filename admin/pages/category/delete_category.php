<?php
	
	if(isset($_GET["id"]) == true)
	{
        $id = $_GET["id"];
        $delete ="DELETE FROM `product` where `Category_Id`='$id'";
        $sql = "DELETE FROM `ebook`.`category` WHERE `Category_Id` = '$id'";
        DataProvider::ExecuteQuery($delete);
		DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL('../../ebook/admin/index.php?act=3');
?>
