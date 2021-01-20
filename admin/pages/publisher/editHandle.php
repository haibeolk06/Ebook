<?php
	include("../../../DBConnect.php");


	if(isset($_GET["id"]) == true)
	{
		$id = $_GET["id"];
		$companyname = $_GET["txtCompany_Name"];
		$ktsql = "SELECT Publishing_Company_Name FROM publishing_company WHERE Publishing_Company_Name='$companyname'";
		// $bang=DataProvider::ExecuteQuery($ktsql);
		$bang=LoadData($ktsql);

		// $dong=mysqli_num_rows($bang);
		if(count($bang) != 0)
		{
			echo "<script type='text/javascript'>alert('Trùng dữ liệu');</script>";
			DataProvider::ChangeURL('../../index.php?act=2&sub=3');
		}
		else
		{
			$sql = "UPDATE `ebook`.`publishing_company` SET `Publishing_Company_Name` = '$companyname' WHERE `Publishing_Company_Id` = $id";
			DataProvider::ExecuteQuery($sql);
		}
			
	}
	DataProvider::ChangeURL('../../index.php?act=2');
?>
