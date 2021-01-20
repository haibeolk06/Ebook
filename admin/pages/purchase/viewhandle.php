<?php
	include("../../../DBConnect.php");


	if(isset($_GET["id"]) == true)
	{
		$id = $_GET["id"];
		$productid = $_GET["txtproductid"];
		$quantity = $_GET["txtquantity"];
        $totalamount = $_GET["txttotalamount"];
		
		//$sql = "UPDATE `ebook`.`purchasedetail` SET `Product_Id` = '$productid',`Quantity`= '$quantity', `TotalAmount`='$totalamount',WHERE Purchase_Id = $id";
		DataProvider::ExecuteQuery($sql);	
	}
	DataProvider::ChangeURL('../../index.php?act=5');
?>
