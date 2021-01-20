<div class="content-page">
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Publishing CO</a></li>
                        <li class="breadcrumb-item active">Edit Publishing CO</li>

                    </ol>
                </div>
                <h4 class="page-title">Edit Publishing CO</h4>
            </div>
        </div>
    </div>     
<?php
	if(isset($_GET['id']) == false)
		DataProvider::ChangeURL('index.php?act=2');
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM publishing_company WHERE Publishing_Company_Id = '$id'";
	$bang = DataProvider::ExecuteQuery($sql);
	$dong = mysqli_fetch_array($bang);
?>

<form style="margin: 0 auto; width:300px; font-size: 14px " action="pages/publisher/editHandle.php" method="get">
	<fieldset>
        <legend>Account info</legend>
        Publishing Company Name
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtCompany_Name" value="<?php echo $dong["Publishing_Company_Name"]; ?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>" />
    </fieldset>
   
    <fieldset style="padding-top: 15px; text-align: center ">
        <input class="btn btn-danger" style="margin-right: 10px; width: 70px; height: 35px" type="submit" value="Edit"/>
        <input class="btn btn-danger" style="width: 70px; height: 35px" type="button" value="Cancel" onClick="location = 'index.php?act=2';" />
    </fieldset>
</form>
</div>