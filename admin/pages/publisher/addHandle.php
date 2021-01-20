<?php
	include("../../../DBConnect.php");


	if(isset($_GET["txtCompany_Name"]) == true)
	{
        
        $name = $_GET["txtCompany_Name"];
        $ktsql = "SELECT Publishing_Company_Name FROM publishing_company WHERE Publishing_Company_Name='$name'";
		// $bang=DataProvider::ExecuteQuery($ktsql);
		$bang=LoadData($ktsql);

		// $dong=mysqli_num_rows($bang);
		if(count($bang) != 0)
		{
			echo "<script type='text/javascript'>alert('Trùng dữ liệu');</script>";
			DataProvider::ChangeURL('../../index.php?act=2&sub=4');
		}
		else
		{
			$sql = "INSERT INTO `ebook`.`publishing_company`(`Publishing_Company_Name`) VALUES('$name')";
			DataProvider::ExecuteQuery($sql);	
		}
		
	}
	DataProvider::ChangeURL('../../index.php?act=2');
?>
