<?php 
    //gui nhan du lieu thong qua model,hien du lieu thong qua view

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'detail':
                //lay du lieu
                
                include_once "model/m_book.php";
                $ctSach=book_getById($_GET['id']);
                $dsNgauNhienCungChuDe=book_getRandomByCategory($ctSach['MaCD']);
                //hien thi du lieu
                $view_name = 'book_detail';
                break;
            case 'search':
                if(isset($_POST['keyword'])){
                    $keyword = $_POST['keyword'];
                }
                include_once "model/m_book.php";
                $page=1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $ketqua = book_search($_POST['keyword'],$page);

                $view_name = 'book_search';
                break;  
            case 'addToCart':
                if(!isset($_SESSION['user'])){
                    $_SESSION['loi']='Vui long dang nhap';
                    header("Location:?mod=user&act=login");
                    return;
                }
                $MaSach = $_GET['id'];
                $MaTK = $_SESSION['user']['MaTK'];
                //kiem tra co gio hang chua
                
                try {
                    include_once "model/m_history.php";
                    $kq = history_hasCart($MaTK);
                    if($kq){
                        //dung ->them sach vao gio hang
                        history_addToCart($kq['MaLS'],$MaSach);
                    }else{
                        //sai ->them gio hang
                        history_add($MaTK);
                        $kq = history_hasCart($MaTK);
                        history_addToCart($kq['MaLS'],$MaSach);
                    }
                    $_SESSION['thongbao']="Them sach vao gio hang thanh cong";
                } catch (\Throwable $th) {
                    $_SESSION['loi']="Sach da co trong gio hang";
                }
               
                header("Location:?mod=book&act=detail&id=$MaSach");
                break;
            case 'removeFormCart':
                include_once "model/m_history.php";
                $MaTK = $_SESSION['user']['MaTK'];
                $MaSach = $_GET['id'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    history_removeFormCart($GioSach['MaLS'],$MaSach);
                }
                header("Location:?mod=page&act=cart&id=$MaSach");
                break;
            case 'removeCart':
                include_once "model/m_history.php";
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    history_removeCart($GioSach['MaLS']);
                }
                header("Location:?mod=page&act=cart&id=$MaSach");
                break;
            case 'updateCart':
                include_once "model/m_history.php";
                $MaTK = $_SESSION['user']['MaTK'];
                $GioSach = history_hasCart($MaTK);
                if($GioSach){
                    $NgayMuon = $_POST['NgayMuon'];
                    $NgayTra = $_POST['NgayTra'];
                    // print_r($NgayTra);return;
                    $SoSachMuon = $_POST['SoSachMuon'];
                    $TongTien = $_POST['TongTien'];
                    $TrangThai = 'chuan-bi';

                    include_once "model/m_book.php";
                    $ctGioSach = history_getCart($MaTK);
                    foreach($ctGioSach as $sach){
                        book_decreaseAmount($sach['MaSach']);
                    }

                    history_updateCart($GioSach['MaLS'],$NgayMuon,$NgayTra,$SoSachMuon,$TongTien,$TrangThai);
                    $_SESSION['thongbao']="Muon sach thanh cong";
                }
                header("Location:?mod=page&act=cart&id=$MaSach");
                break;
            default:
                # code...
                break;
        }
        
       include_once('view/v_user_layout.php');
    }



?>