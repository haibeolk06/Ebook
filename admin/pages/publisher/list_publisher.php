
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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Publishing CO</a></li>
                                            <li class="breadcrumb-item active">Show All</li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Publishing CO</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 
                        
                        <table>
                            <tr style="text-align: center; font-size: 14px">
                                <th width="400">Publishing Company Id</th>
                                <th width="300">Publishing Company Name</th>
                               
                            </tr>
                            <?php
                                // include('../DBConnect.php');
                                $sql = "SELECT * FROM publishing_company";
                                $bang = DataProvider::ExecuteQuery($sql);

                                while($row = mysqli_fetch_array($bang))
                                {
                                    ?>
                                        <tr style="text-align: center;"> 
                                            <td><?php echo $row["Publishing_Company_Id"]; ?></td>
                                            <td><?php echo $row["Publishing_Company_Name"]; ?></td>
                                            
                                            <td>
                                                <a href="index.php?act=2&sub=3&id=<?php echo $row["Publishing_Company_Id"]; ?>">
                                                    <i class="far fa-edit"></i>
                                                    <span>Edit</span>
                                                </a>
                                                <a onclick="return window.confirm('Delete this item?');" href="index.php?act=2&sub=2&id=<?php echo $row["Publishing_Company_Id"]; ?>">
                                                    <i style="margin-left: 15px" class="la la-times-circle-o"></i>
                                                    <span >Delete</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>	
                        </table>

                        
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
