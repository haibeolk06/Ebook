<?php
	include("../../../DBConnect.php");


	if(isset($_GET["id"]) == true)
	{
        $id = $_GET["id"];
        $name =$_GET["txtProduct_Name"];
        $catid =$_GET["txtCat_Id"];
        $sku =$_GET["txtSKU"];
        $publish =$_GET["txtPublishingCo_Id"];
        $author =$_GET["txtAuthor"];
        $price =$_GET["txtPrice"];
        $quantity =$_GET["txtQuantity"];
        $date =$_GET["txtDate"];
        $description = $_GET["txtDecription"];
        // $avatar =$_GET["txtAvatar"];

		$sql = "SELECT * FROM product WHERE SKU='$sku' and `Name`='$name' and Category_Id='$catid' and Publishing_Company_Id='$publish' and Author='$author' and Price='$price' and Quantity='$quantity' and `Description`='$description' and `Date`='$date' ";
		// $bang=DataProvider::ExecuteQuery($ktsql);
		$bang=LoadData($sql);
        $url="../../index.php?act=4&sub=3&id=".$id;
		// $dong=mysqli_num_rows($bang);
		if(count($bang) != 0)
		{
			echo "<script type='text/javascript'>alert('Trùng dữ liệu');</script>";
            DataProvider::ChangeURL($url);
		}
		else
		{
			$updatesql = "UPDATE `ebook`.`product` SET `Category_Id` = '$catid', `SKU` = '$sku', `Name` = '$name', `Publishing_Company_Id` = '$publish', `Author` = '$author', `Price` = '$price', `Quantity` = '$quantity', `Description` = '$description', `Date` = '$date' WHERE (`Product_Id` = '$id')";
			DataProvider::ExecuteQuery($updatesql);
		}
			
	}
	DataProvider::ChangeURL('../../index.php?act=4');
?>
