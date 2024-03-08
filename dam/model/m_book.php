<?php
//thao tac du lieu trong csdl
    include_once "model/m_pdo.php";
    function book_getNew($limit){
        return pdo_query("SELECT * FROM sach ORDER BY MaSach DESC LIMIT $limit");

    }

    function book_getPin($limit){
        return pdo_query("SELECT * FROM sach WHERE GhimTrangChu=1 LIMIT $limit");
        
    }
    function book_getMostViewed($limit){
        return pdo_query("SELECT * FROM sach ORDER BY LuotDoc LIMIT $limit");
    }

    function book_getById($id){
        return pdo_query_one("SELECT * FROM sach s INNER JOIN chude cd ON s.MaCD=cd.MaCD WHERE s.MaSach = ?",$id);
    }

    function book_getRandomByCategory($id){
        return pdo_query("SELECT * FROM sach WHERE MaCD=$id ORDER BY RAND() LIMIT 3");
    }

    function book_getByCategory($id){
        return pdo_query("SELECT * FROM sach WHERE MaCD=$id");
    }

    function book_search($keyword,$page=1){
        $batdau=($page-1)*8;
        return pdo_query("SELECT * FROM sach WHERE TuaSach LIKE '%$keyword%'LIMIT $batdau,8");
    }

    function book_decreaseAmount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong - 1 WHERE MaSach = ?",$MaSach);
    }
    function book_increaseAmount($MaSach){
        pdo_execute("UPDATE sach SET SoLuong = SoLuong + 1 WHERE MaSach = ?",$MaSach);
    }
    function book_count(){
        return pdo_query_value("SELECT COUNT(*) FROM sach");
    }

?>