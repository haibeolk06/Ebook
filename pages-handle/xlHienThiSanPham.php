<?php
    //include '..\DBConnect.php';
    $href = "";
    $sql = "";
    
    #Hiển thị sản phẩm theo từ khoá tìm kiếm
    if($_REQUEST['view'] == "search"){
        if (isset($_REQUEST['q'])){          
            #Nhận từ khoá tìm kiếm từ người dùng
            $contentSearch = $_REQUEST['q'];

            #Chuyển các ký tự đầU tiên của mỗi từ thành chữ Hoa, áp dụng cho kiểu UTF8
            $contentSearch = mb_convert_case($contentSearch, MB_CASE_TITLE, "UTF-8");
            
            
            #Tìm kiếm theo kiểu nhị phân
            $sql = "SELECT P.*, C.Category_Name, PC.Publishing_Company_Name 
                FROM product P, category C, publishing_company PC 
                WHERE P.Category_Id = C.Category_Id AND P.Publishing_Company_Id = PC.Publishing_Company_Id
                AND (P.Name LIKE BINARY '%$contentSearch%'
                OR P.Author LIKE BINARY '%$contentSearch%'
                OR P.Publishing_Company_Id IN (SELECT Publishing_Company_Id FROM publishing_company WHERE Publishing_Company_Name LIKE BINARY '%$contentSearch%')           
                OR P.Category_Id IN (SELECT Category_Id FROM category WHERE Category_Name LIKE BINARY '%$contentSearch%'))";
                             
            $href .= "index.php?page=SanPham&view=search&q=" . $contentSearch . "&cur_page=";
        } 
    }

    #Hiển thị sản phẩm theo bộ lọc
    elseif ($_REQUEST['view'] == "filter"){  

        if(isset($_SESSION['ds_LoaiSach'])){
            #Câu truy vấn để lấy các sản phẩm thuộc danh sách 'loại sản phẩm'
            $sql .= "SELECT P.*, C.Category_Name, PC.Publishing_Company_Name 
                    FROM product P, category C, publishing_company PC 
                    WHERE P.Category_Id = C.Category_Id AND P.Publishing_Company_Id = PC.Publishing_Company_Id
                    AND P.Category_Id IN (";

            #Lấy danh sách loại sách mà người dùng đã chọn
            foreach ($_SESSION['ds_LoaiSach'] as $key => $value) {
                $sql .= "'". $value['category_id'] . "'". " ,";           
            }

            #Xoá dấu phẩy ở cuối $sql
            $sql = trim($sql, ",");
            $sql .= ")";
        }                   

        if(isset($_SESSION['ds_NXB'])){
            if($sql == "")
                #Câu truy vấn để lấy các sản phẩm thuộc danh sách 'nhà xuất bản'
                $sql .= "SELECT P.*, C.Category_Name, PC.Publishing_Company_Name 
                        FROM product P, category C, publishing_company PC 
                        WHERE P.Category_Id = C.Category_Id AND P.Publishing_Company_Id = PC.Publishing_Company_Id
                        AND P.Publishing_Company_Id IN (";
            else{
                $sql .= " AND P.Publishing_Company_Id IN (";
            }
            
            #Lấy danh sách nhà xuất bản mà người dùng đã chọn
            foreach ($_SESSION['ds_NXB'] as $key => $value) {
                $sql .= "'". $value['publishing_company_id'] . "'". " ,";           
            }

            #Xoá dấu phẩy ở cuối $sql
            $sql = trim($sql, ",");
            $sql .= ")";
        }

        if(!isset($_SESSION['ds_LoaiSach']) AND !isset($_SESSION['ds_NXB']))
            $sql .= "SELECT P.*, C.Category_Name, PC.Publishing_Company_Name 
                    FROM product P, category C, publishing_company PC 
                    WHERE P.Category_Id = C.Category_Id AND P.Publishing_Company_Id = PC.Publishing_Company_Id";

        #Tạo biến $href để sử dụng trong templates/mauSoTrang.php
        $href .= "index.php?page=SanPham&view=filter&cur_page=";
    }

    #Hiển thị tất cả sản phẩm
    elseif ($_REQUEST['view'] == "all"){
        $sql .= "SELECT P.*, C.Category_Name, PC.Publishing_Company_Name 
                 FROM product P, category C, publishing_company PC 
                 WHERE P.Category_Id = C.Category_Id AND P.Publishing_Company_Id = PC.Publishing_Company_Id";
        unset($_SESSION['ds_LoaiSach']);
        unset($_SESSION['ds_NXB']);
        #Tạo biến $href để sử dụng trong templates/mauSoTrang.php
        $href .= "index.php?page=SanPham&view=all&cur_page=";        
    }

    #Lấy kết quả từ câu truy vấn để tính tổng số record
    $result = LoadData($sql);
    $total_records = count($result);

    #Trang hiện tại và giới hạn sản phẩm trong 1 trang
    $current_page = isset($_GET['cur_page']) ? $_GET['cur_page'] : 1;
    $limit = 9;
    
    #Tính tổng số trang, hàm ceil để làm tròn số
    $total_page = ceil($total_records / $limit);

    if($current_page >= $total_page){
        $current_page = $total_page;
    }
    else if($current_page <= 1){
        $current_page = 1;
    }

    #Tính records bắt đầu
    if($total_records == 0)
        $start = 1;
    else   
        $start = ($current_page - 1) * $limit;

    #Nối câu truy vấn với LIMIT   
    $sql .= " LIMIT $start, $limit";
    #Truy vấn để lấy dữ liệu tương ứng
    $result = LoadData($sql);   

    foreach ($result as $row) {
        include './templates/mauSanPham.php';
    }

    #Tạo các SESSION để sử dụng cho templates/mauSoTrang.php
    $_SESSION['current_page'] = $current_page;
    $_SESSION['total_page'] = $total_page;
    $_SESSION['href'] = $href;
?>