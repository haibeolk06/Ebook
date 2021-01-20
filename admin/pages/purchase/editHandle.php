<?php
	include("../../../DBConnect.php");


	if(isset($_GET["id"]) == true)
	{
		$id = $_GET["id"];
		$firstname = $_GET["txtName"];
		$address = $_GET["txtAddress"];
        $email = $_GET["txtEmail"];
        $phone = $_GET["txtPhonenumber"];
        $date = $_GET["txtDate"];
        $total = $_GET["txtTotal"];
        $state = $_GET["txtState"];
		
		$sql = "UPDATE `ebook`.`purchase` SET `Name` = '$firstname',`DeliveryAddress`= '$address', `Email`='$email', `PhoneNumber`='$phone', `CreatedAt`='$date', `Total`='$total',`State`='$state' WHERE Purchase_Id = $id";
		DataProvider::ExecuteQuery($sql);	
	}
	DataProvider::ChangeURL('../../index.php?act=5');
?>
