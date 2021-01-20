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
                        <li class="breadcrumb-item active">Add Publishing CO</li>

                    </ol>
                </div>
                <h4 class="page-title">Add Publishing CO</h4>
            </div>
        </div>
    </div>     
<!-- end page title --> 
    <form style="margin: 0 auto; width:300px; font-size: 14px " action="pages/publisher/addHandle.php" method="get">
    
        <fieldset>
            Publishing Company Name
            <input style="margin-bottom: 7px" class="form-control" type="text" required="" name="txtCompany_Name"  />
            
        </fieldset>
        
        <fieldset style="padding-top: 20px; text-align: center">
            <input class="btn btn-danger" style="margin-right:10px; width: 70px"  type="submit" value="Add" />
            <input class="btn btn-danger" style="width: 70px" type="button" value="Cancel" onClick="location = 'index.php?act=2';" />
        </fieldset>

    </form>

</div>