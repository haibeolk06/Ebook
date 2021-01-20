<?php
	include("../../../DBConnect.php");
	

	if(isset($_POST["id"]) == true)
	{
		$id = $_POST["id"];
		$firstname = $_POST["txtFirst_name"];
		$lastname = $_POST["txtLast_name"];
        $email = $_POST["txtEmail"];
		$phone = $_POST["txtPhonenumber"];
		$address = $_POST["txtAddress"];
        $password = $_POST["txtPassword"];
		$verified = $_POST["txtVerified"];
		$role = $_POST["RoleSelect"];

		if($password == ""){
			
				$sql = "UPDATE `ebook`.`user` 
						SET `User_Role`= $role,
							`First_Name` = '$firstname',
							`Last_Name`= '$lastname',  
							`Phonenumber`='$phone', 
							`Address`='$address',
							`Verified`=$verified
						WHERE User_Id = $id";
		}
			else{
				$password = md5($password);
				$sql = "UPDATE `ebook`.`user` 
				SET `User_Role`= $role,
					`First_Name` = '$firstname',
					`Last_Name`= '$lastname',  
					`Phonenumber`='$phone', 
					`Address`='$address',
					`Password`='$password',
					`Verified`=$verified
				WHERE User_Id = $id";
			}
		

		$url = '../../index.php?act=1&sub=1';
		#Thực hiện câu truy vấn để UPDATE dữ liệu mới
		$result = Insert($sql);
		if($result == true){
			echo "<script type='text/javascript'>alert('Sửa tài khoản thành công');</script>";
			DataProvider::ChangeURL($url);
		}
		else{
			echo "<script type='text/javascript'>alert('Đã xảy ra lỗi khi sửa tài khoản');</script>";
			DataProvider::ChangeURL($url);
		}
	}
?>
