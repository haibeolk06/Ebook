<div class="content-page">
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                        <li class="breadcrumb-item active">Edit Produt</li>

                    </ol>
                </div>
                <h4 class="page-title">Edit Product</h4>
            </div>
        </div>
    </div>     
<?php
	if(isset($_GET['id']) == false)
		DataProvider::ChangeURL('index.php?act=4');
	
	$id = $_GET['id'];
	
	$sql = "SELECT * FROM product WHERE `Product_Id` = '$id'";
	$bang = DataProvider::ExecuteQuery($sql);
	$dong = mysqli_fetch_array($bang);
?>

<form style="margin: 0 auto; width:500px; font-size: 14px " action="pages/product/editHandle.php" method="get">
	
    <fieldset>
        <legend>Product info</legend>
        Product Name
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtProduct_Name" value="<?php echo $dong["Name"]; ?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>" />
    </fieldset>
    <fieldset>
        Category Id
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtCat_Id" value="<?php echo $dong["Category_Id"]; ?>" />
    </fieldset>
    <fieldset>
        SKU
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtSKU" value="<?php echo $dong["SKU"]; ?>" />
    </fieldset>
    <fieldset>
        Publishing Company Id
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtPublishingCo_Id" value="<?php echo $dong["Publishing_Company_Id"]; ?>" />
    </fieldset>
    <fieldset>
        Author
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtAuthor" value="<?php echo $dong["Author"]; ?>" />
    </fieldset>
    <fieldset>
        Price
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtPrice" value="<?php echo $dong["Price"]; ?>" />
    </fieldset>
    <fieldset>
        Quantity
        <input style="margin-bottom:7px;" class="form-control" type="text" required="" name="txtQuantity" value="<?php echo $dong["Quantity"]; ?>" />
    </fieldset>
    <fieldset>
        Date Created
        <input style="margin-bottom:7px;" class="form-control" type="date" required="" name="txtDate" value="<?php echo $dong["Date"]; ?>" />
    </fieldset>
    <fieldset>
        Description
        <textarea style="border-radius: .2rem; margin-bottom:7px; width: 500px; height: 300px; background: #434b56; color: #f7f7f7" required="" name="txtDecription"><?php echo $dong["Description"];?></textarea>
        
    </fieldset>
    <fieldset>
        Avatar
        </br>
        <img src="..\<?= $dong['Avatar'] ?>" style="width:100px; height: 100px; margin-bottom: 10px" />
        </br>
        <input type="file" name="myfile" />
    </fieldset>

    <fieldset style="padding-top: 15px; text-align: center ">
        <input class="btn btn-danger" style="margin-right: 10px; width: 70px; height: 35px" type="submit" value="Edit"/>
        <input class="btn btn-danger" style="width: 70px; height: 35px" type="button" value="Cancel" onClick="location = 'index.php?act=4';" />
    </fieldset>
</form>
</div>