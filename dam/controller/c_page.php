<?php 
    //gui nhan du lieu thong qua model,hien du lieu thong qua view

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'home':
                //lay du lieu
                include_once "model/m_book.php";
                $dsMoi=book_getNew(10);
                $dsGhim=book_getPin(4);
                //hien thi du lieu
                $view_name = 'page_home';
                break;
            case 'cart':
                include_once "model/m_history.php";
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    $ctGioSach = history_getCart($MaTK);
                }else{
                    $ctGioSach = [];
                }

                $view_name = 'page_cart';
                break;
            case 'history':
                include_once "model/m_history.php";
                $MaTK = $_SESSION['user']['MaTK'];
                $dsLichSu =history_getAllByAccount($MaTK);

                $view_name = 'page_history';
                break;


                case 'tintuc':
                    include_once "model/m_tintuc.php";
                    $dsTt=tintuc_getAll();
                    $view_name = 'page_tintuc';
                    break;  
            default:
                # code...
                break;
        }
       
       include_once('view/v_user_layout.php');
    }



?>