<?php 
    //gui nhan du lieu thong qua model,hien du lieu thong qua view

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'login':
                //lay du lieu
                include_once "model/m_user.php";
                if (isset($_POST["soDienThoai"]) && isset($_POST["matKhau"])) {
                    $kq = user_login($_POST['soDienThoai'], $_POST['matKhau']);
                    if ($kq) {
                        //dung ->dang nhap thanh cong
                        $_SESSION['user'] = $kq;
                        header("Location:?mod=page&act=home");
                    }else{
                        //sai ->dang nhap that bai
                        $_SESSION['loi']="Sai tai khoan hoac mat khau";
                    }
                }
               
                //hien thi du lieu
                $view_name = 'user_login';
                break;
            case 'logout':
                unset($_SESSION['user']);
                header("Location:?mod=page&act=home");
                break;  
            default:
                # code...
                break;
        }
        
       include_once('view/v_user_layout.php');
    }



?>