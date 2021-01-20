<?php
	include("../../../DBConnect.php");


	if(isset($_GET["id"]) == true)
	{
		$id = $_GET["id"];
		$categoryname = $_GET["txtCategory_Name"];
		$ktsql = "SELECT Category_Name FROM category WHERE Category_Name='$categoryname'";
		// $bang=DataProvider::ExecuteQuery($ktsql);
		$bang=LoadData($ktsql);

		// $dong=mysqli_num_rows($bang);
		if(count($bang) != 0)
		{
			echo "<script type='text/javascript'>alert('Trùng dữ liệu');</script>";
			DataProvider::ChangeURL('../../index.php?act=3&sub=3');
		}
		else
		{
			$sql = "UPDATE `ebook`.`category` SET `Category_Name` = '$categoryname' WHERE `Category_Id` = '$id'";
			DataProvider::ExecuteQuery($sql);
		}
			
	}
	DataProvider::ChangeURL('../../index.php?act=3');
?>
