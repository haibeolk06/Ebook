<div class="content-page">
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Purchase</a></li>
                        <li class="breadcrumb-item active">Edit Purchase</li>

                    </ol>
                </div>
                <h4 class="page-title">Edit Purchase</h4>
            </div>
        </div>
    </div>    
<?php
    if(isset($_GET['id']) == false)
        DataProvider::ChangeURL('index.php?act=5');

    $id = $_GET['id'];

    $sql = "SELECT * FROM purchase WHERE Purchase_Id = $id";
    $bang = DataProvider::ExecuteQuery($sql);
    $dong = mysqli_fetch_array($bang);
?> 
<!-- end page title --> 
    <form style="margin: 0 auto; width:300px; font-size: 14px " action="pages/purchase/editHandle.php" method="get">
    <fieldset>
        <legend>Purchase Edit Info</legend>
        First Name
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtName" value="<?php echo $dong["Name"]; ?>" />
        <input type="hidden" name="id" value="<?php echo $id;?>" />
    </fieldset>
    <fieldset>
        Email
        <input style="margin-bottom:7px;" class="form-control" type="email" name="txtEmail" value="<?php echo $dong["Email"]; ?>" />
    </fieldset>
    <fieldset>
        Address
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtAddress" value="<?php echo $dong["DeliveryAddress"]; ?>" />
    </fieldset>
    <fieldset>
        Phone Number
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtPhonenumber" value="<?php echo $dong["PhoneNumber"]; ?>" />
    </fieldset>
    <fieldset>
        Created
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtDate" value="<?php echo $dong["CreatedAt"]; ?>" />
    </fieldset>
    <fieldset>
        Total
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtTotal" value="<?php echo $dong["Total"]; ?>" />
    </fieldset>
    <fieldset>
        State
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtState" value="<?php echo $dong["State"]; ?>" />
    </fieldset>
    <fieldset style="padding-top: 15px; text-align: center ">
        <input class="btn btn-danger" style="margin-right: 10px; width: 70px; height: 35px" type="submit" value="Edit"/>
        <input class="btn btn-danger" style="width: 70px; height: 35px" type="button" value="Cancel" onClick="location = 'index.php?act=5';" />
    </fieldset>

    </form>

</div>