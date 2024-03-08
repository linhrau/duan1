<?php 
    //gui nhan du lieu thong qua model,hien du lieu thong qua view

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'detail':
                //lay du lieu
                
                include_once "model/m_category.php";
                $ctChuDe=category_getById($_GET['id']);
                include_once "model/m_book.php";
                $dsSach=book_getByCategory($_GET['id']);
                //hien thi du lieu
                $view_name = 'category_detail';
                break;
            
            default:
                # code...
                break;
        }
        // include_once('view/v_'.$view_name.'.php');
       include_once('view/v_user_layout.php');
    }



?>