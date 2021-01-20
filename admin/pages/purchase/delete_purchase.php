<?php
	
	if(isset($_GET["id"]) == true)
	{
        $id = $_GET["id"];
        $detail = "DELETE FROM `ebook`.`purchasedetail` WHERE `Purchase_Id` = '$id'";
        $sql = "DELETE FROM `ebook`.`purchase` WHERE `Purchase_Id` = '$id'";
        DataProvider::ExecuteQuery($detail);
		DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL('../../ebook/admin/index.php?act=5');
?>
