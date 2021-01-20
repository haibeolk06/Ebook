<html>
    <head>
        <style>

            .paging{
                font-size: 14px;
                text-align: right; 
                margin-top: 30px;
            }

            .paging a{
                color: #FFF;    
            }

            .page-item{
                /* border: 1px solid #ccc;
                padding: 5px 9px; */
                display: inline-block;
                width: 40px;
                height: 40px;
                line-height: 40px;
                text-align: center;
                background-color: #f0643b;
                -webkit-transition: 0.2s all;
                transition: 0.2s all;
                border-radius: 2px;
            }

            .paging a:hover{
                background-color: #3B434E;
                color: #D10024;
            }

            .paging a:active{
                background-color: #D10024;
                border-color: #D10024;
                color: #FFF;
                font-weight: 500;
                cursor: default;
            } 
        </style>
    </head>
</html>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Ebook</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                            <li class="breadcrumb-item active">Show All</li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Product</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <table>
                            <tr style="text-align: center; font-size: 14px; ">
                                <th width="70">Cat Id</th>
                                <th width="70">SKU</th>
                                <th width="300">Name</th>
                                <th width="150">Author</th>
                                <th width="100">Date Created</th>
                                <th width="200">Avatar</th>
                            </tr>
                            <?php
                                $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
                                $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
                                $offset = ($current_page - 1) * $item_per_page;
                                $sql= "SELECT * FROM `product`";
                                $totalRecords = DataProvider::ExecuteQuery($sql);
                                $totalRecords = $totalRecords->num_rows;
                                $totalPages = ceil($totalRecords / $item_per_page);
                                $sqlpage= "SELECT * FROM `product` ORDER BY `Product_Id` ASC LIMIT $item_per_page OFFSET $offset";
                                $products = DataProvider::ExecuteQuery($sqlpage);
                                // mysqli_close($con);

                                // $sql = "SELECT * FROM product";
                                // $bang = DataProvider::ExecuteQuery($sql);

                                while($row = mysqli_fetch_array($products))
                                {
                                    ?>
                                        <tr style="text-align: center;"> 
                                            <td><?php echo $row["Category_Id"]; ?></td>
                                            <td><?php echo $row["SKU"]; ?></td>
                                            <td><?php echo $row["Name"]; ?></td>
                                            <td><?php echo $row["Author"]; ?></td>
                                            <td><?php echo $row["Date"]; ?></td>
                                            <td><img src="..\<?= $row['Avatar'] ?>" style="width:70px; height: 70px; margin-top: 15px" /></td>
                                            <td>
                                                <a href="index.php?act=4&sub=3&id=<?php echo $row["Product_Id"]; ?>">
                                                    <i class="far fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a onclick="return window.confirm('Delete this item?');" href="index.php?act=4&sub=2&id=<?php echo $row["Product_Id"]; ?>">
                                                    <i style="margin-left: 15px" class="la la-times-circle-o"></i>
                                                    <span>Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>	
                        </table>
                        
                        <div class="paging" >
                            <?php 
                            if($current_page > 3){
                                $first_page = 1;?>
                                <a class="page-item" href="index.php?act=4?per_page=<?=$item_per_page?>&page=<?=$first_page?>">First</a>
                            <?php }
                            if($current_page > 1){
                                $prev_page = $current_page - 1;?>
                                <a class="page-item" href="index.php?act=4?per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Prev</a>
                            <?php }
                            for($num = 1; $num <= $totalPages; $num++){?>
                                <?php if($num != $current_page){ ?>
                                    <?php if($num >  $current_page - 3 && $num < $current_page + 3){?>
                                        <a class="page-item" href="index.php?act=4?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
                                    <?php } ?>
                                <?php }else{ ?>
                                    <strong class="current-page page-item"><?=$num?></strong>
                                <?php } ?>
                            <?php }
                            if($current_page < $totalPages - 1){
                                $next_page = $current_page + 1;?>
                                <a class="page-item" href="index.php?act=4?per_page=<?=$item_per_page?>&page=<?=$next_page?>">Next</a>
                            <?php }
                            if($current_page < $totalPages - 3){
                                $end_page = $totalPages;?>
                                <a class="page-item" href="index.php?act=4?per_page=<?=$item_per_page?>&page=<?=$end_page?>">Last</a>
                                <?php 
                            }
                            ?>
                        </div> 
                        
                                                    
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
