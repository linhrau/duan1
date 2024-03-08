<?php
//thao tac du lieu trong csdl
    include_once "model/m_pdo.php";
    function category_getAll(){
        return pdo_query("SELECT * FROM chude");

    }

    function category_getById($id){
        return pdo_query_one("SELECT * FROM chude WHERE MaCD = ?",$id);
    }
    function category_count(){
        return pdo_query_value("SELECT COUNT(*) FROM chude");
    }
    function category_statByBook(){
        return pdo_query("SELECT cd.MaCD, cd.TenChuDe,COUNT(s.MaSach) AS SoLuong,AVG(s.GiaTri) AS TrungBinh, MIN(s.GiaTri) AS ThapNhat,MAX(s.GiaTri) AS CaoNhat
        FROM chude cd LEFT JOIN sach s ON cd.MaCD=s.MaCD
        GROUP BY cd.MaCD, cd.TenChuDe;");
    }
?>