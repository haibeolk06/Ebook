<?php
	
	if(isset($_GET["id"]) == true)
	{
        $id = $_GET["id"];
        $delete="DELETE FROM `product` WHERE `Publishing_Company_Id`='$id'"
        $sql = "DELETE FROM `ebook`.`publishing_company` WHERE `Publishing_Company_Id` = '$id'";
        DataProvider::ExecuteQuery($delete);
		DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL('../../ebook/admin/index.php?act=2');
?>
