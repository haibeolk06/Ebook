<?php
	include("../../../DBConnect.php");


	if(isset($_GET["txtCategory_Id"]) == true)
	{
        $id = $_GET["txtCategory_Id"];
        $name = $_GET["txtCategory_Name"];
		$ktsql = "SELECT Category_Id,Category_Name FROM category WHERE Category_Id='$id' or Category_Name='$name'";
		// $bang=DataProvider::ExecuteQuery($ktsql);
		$bang=LoadData($ktsql);

		// $dong=mysqli_num_rows($bang);
		if(count($bang) != 0)
		{
			echo "<script type='text/javascript'>alert('Trùng dữ liệu');</script>";
			DataProvider::ChangeURL('../../index.php?act=3&sub=4');
		}
		else
		{
			$sql = "INSERT INTO `ebook`.`category`(`Category_Id`, `Category_Name`) VALUES('$id','$name')";
			DataProvider::ExecuteQuery($sql);	
		}
	}
	DataProvider::ChangeURL('../../index.php?act=3');
?>
