<div class="content-page">
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>

                    </ol>
                </div>
                <h4 class="page-title">Edit Category</h4>
            </div>
        </div>
    </div>     
<?php
	if(isset($_GET['id']) == false)
		DataProvider::ChangeURL('index.php?act=3');
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM category WHERE `Category_Id` = '$id'";
	$bang = DataProvider::ExecuteQuery($sql);
	$dong = mysqli_fetch_array($bang);
?>

<form style="margin: 0 auto; width:300px; font-size: 14px " action="pages/category/editHandle.php" method="get">
	
    <fieldset>
        <legend>Category info</legend>
        Category Name
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtCategory_Name" value="<?php echo $dong["Category_Name"]; ?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>" />
    </fieldset>
   
    <fieldset style="padding-top: 15px; text-align: center ">
        <input class="btn btn-danger" style="margin-right: 10px; width: 70px; height: 35px" type="submit" value="Edit"/>
        <input class="btn btn-danger" style="width: 70px; height: 35px" type="button" value="Cancel" onClick="location = 'index.php?act=3';" />
    </fieldset>
</form>
</div>