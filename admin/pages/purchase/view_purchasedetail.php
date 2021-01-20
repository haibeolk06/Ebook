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
                        <li class="breadcrumb-item active">Purchase Detail</li>

                    </ol>
                </div>
                <h4 class="page-title">Purchase Detail</h4>
            </div>
        </div>
    </div>    

                        <table>
                            <tr style="text-align: center; font-size: 14px; ">
                                <th width="300">Purchase Id</th>
                                <th width="300">Product Id</th>
                                <th width="300">Quantity</th>
                                <th width="300">Total Amount</th>
                                
                                
                            </tr>
                            <?php
                                if(isset($_GET['id']) == false)
                                    DataProvider::ChangeURL('index.php?act=5');

                                $id = $_GET['id'];

                                $sql = "SELECT * FROM purchasedetail WHERE Purchase_Id = $id";
                                $bang = DataProvider::ExecuteQuery($sql);
                                $dong = mysqli_fetch_array($bang);
                            
                            while($row = mysqli_fetch_array($bang))
                                {
                                    ?>
                                        <tr style="text-align: center;"> 
                                            <td><?php echo $row["Purchase_Id"]; ?></td>
                                            <td><?php echo $row["Product_Id"]; ?></td>
                                            <td><?php echo $row["Quantity"]; ?></td>
                                            <td><?php echo $row["TotalAmount"]; ?></td>
                                            
                                        </tr>
                                    <?php
                                }
                                ?>	
                        </table>
                    <input class="btn btn-danger" style="width: 60px; height: 35px; text-align: center; margin-top: 20px; float: right" type="button" value="Back" onClick="location = 'index.php?act=5';" />

<!-- end page title --> 
    <!-- <form style="margin: 0 auto; width:300px; font-size: 14px " action="pages/purchase/viewHandle.php" method="get">
    <fieldset>
        <legend>Purchase Detail</legend>
        Product ID
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtproductid" value="<?php echo $dong["Product_Id"]; ?>" readonly="false"/>
        <input type="hidden" name="id" value="<?php echo $id;?>"/>
    </fieldset>
    <fieldset>
        Quantity
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txtquantity" value="<?php echo $dong["Quantity"]; ?>"readonly="false" />
    </fieldset>
    <fieldset>
        TotalAmount
        <input style="margin-bottom:7px;" class="form-control" type="text" name="txttotalamount" value="<?php echo $dong["TotalAmount"]; ?>"readonly="false" />
    </fieldset>
    <fieldset style="padding-top: 15px; text-align: center ">
    </fieldset>

    </form> -->

</div>