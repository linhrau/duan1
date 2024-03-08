<?php 
    //gui nhan du lieu thong qua model,hien du lieu thong qua view

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'dashboard':
                //lay du lieu
                include_once "model/m_book.php";
                $tkSach = book_count();
                include_once "model/m_user.php";
                $tkBanDoc = user_count();
                include_once "model/m_category.php";
                $tkChuDe = category_count();
                $tkSachTheoChuDe= category_statByBook();
                include_once "model/m_history.php";
                $tkLuotMuon= history_count();
                $tkDoanhThu= history_stat();
                //hien thi du lieu
                $view_name = 'admin_dashboard';
                break;

            case 'user':
                //lay du lieu
                include_once "model/m_user.php";
                $dsTk=user_getAll();
                //hien thi du lieu abc
                $view_name = 'admin_user';
                break;
           
            case 'user_add':
                include_once "model/m_user.php";
                if (isset($_POST['submit'])) {
                    $SoDienThoai = $_POST['SoDienThoai'];
                    $HoTen = $_POST['HoTen'];
                    $ViTien= $_POST['ViTien'];
                    $Quyen= $_POST['Quyen'];
                    $kq = user_checkPhone($SoDienThoai);
                    if($kq){//dung->bi trung->ko sthem
                        $_SESSION['loi']='Khong the dang ki So Dien Thoai <strong>'.$SoDienThoai.'</strong>';
                    }else{//sai->ko trung->them
                        $MatKhau = 1;
                        $HinhAnh = '2.png';
                        user_add($SoDienThoai, $HoTen,$MatKhau, $ViTien, $Quyen,$HinhAnh);
                        $_SESSION['thongbao']="Them tai khoan va mat khau mac dinh la <strong>'.$MatKhau.'</strong> thanh cong";
                        header("Location:?mod=admin&act=user");
                    }
                }

                $view_name = 'admin_user_add';
                break;
                case 'user_edit':
                    include_once "model/m_user.php";
                    $MaTK=$_GET['id'];
                    if (isset($_POST['submit'])) {
                        $SoDienThoai = $_POST['SoDienThoai'];
                        $HoTen = $_POST['HoTen'];
                        $ViTien= $_POST['ViTien'];
                        $Quyen= $_POST['Quyen'];
                        $kq = user_checkPhone($SoDienThoai);
                        if($kq && $kq['MaTK']!=$MaTK){//dung->bi trung->ko sthem
                            $_SESSION['loi']='So Dien Thoai <strong>'.$SoDienThoai.'</strong> da ton tai';
                        }else{
                            user_edit($MaTK,$SoDienThoai,$HoTen,$ViTien,$Quyen);
                            $_SESSION['thongbao']="Thong tin thay doi da duoc luu lai";
                            header("Location:?mod=admin&act=user");
                        }
                    }
                    $tk = user_getById($MaTK);

                    $view_name = 'admin_user_edit';
                    break;
                case 'user_delete':
                    include_once "model/m_user.php";
                    user_delete($_GET['id']);
                    header("Location:?mod=admin&act=user");
                    
                    break;
                case 'category':
            
                    $view_name = 'admin_category';
                    break;
                case 'book':
                
                    $view_name = 'admin_book';
                    break;  
 //==================================tintuc================================================
                    
                case 'tintuc':
                    include_once "model/m_tintuc.php";
                    $dsTt=tintuc_getAll();
                    $view_name = 'admin_tintuc';
                    break;  

                case 'tintuc_add':
                    include_once "model/m_tintuc.php";
                    if (isset($_POST['submit'])) {
                        $tieu_de = $_POST['tieu_de'];
                        $noi_dung = $_POST['noi_dung'];
                        $hinh_anh = $_POST['hinh_anh'];
                        $id_danh_muc = $_POST['id_danh_muc'];
                        tintuc_add($tieu_de, $noi_dung, $hinh_anh, $id_danh_muc);
                        header("Location:?mod=admin&act=tintuc");
                        
                    }
                    $danhmuc=danh_muc();
                    $view_name = 'admin_tintuc_add';
                    break;

                case 'tintuc_edit':
                    include_once "model/m_tintuc.php";
                    $id = $_GET['id'];
                    if (isset($_POST['submit'])) {
                        $tieu_de = $_POST['tieu_de'];
                        $noi_dung = $_POST['noi_dung'];
                        $hinh_anh = $_POST['hinh_anh'];
                        $id_danh_muc = $_POST['id_danh_muc'];
                        tintuc_edit($id, $tieu_de, $noi_dung, $hinh_anh, $id_danh_muc);
                        header("Location:?mod=admin&act=tintuc");
                        
                    }
                    $danhmuc=danh_muc();
                    $tintuc=tintuc_getById($id);
                    $view_name = 'admin_tintuc_edit';
                    break;

                case 'tintuc_delete':
                    include_once "model/m_tintuc.php";
                    tintuc_delete($_GET['id']);
                    header("Location:?mod=admin&act=tintuc");
                    break;

                    
                default:
                    # code...
                    break;
        }
        
       include_once('view/v_admin_layout.php');
    }



?>