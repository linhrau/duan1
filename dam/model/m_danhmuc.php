<?php
//thao tac du lieu trong csdl
    include_once "model/m_pdo.php";
    function danhmuc(){
        return pdo_query("SELECT * FROM danhmuctintuc");
    }
    function tintuc_getAll(){
        return pdo_query("SELECT tt.*, dm.ten_danhmuc FROM tintuc AS tt INNER JOIN danhmuctintuc AS dm ON dm.id_danhmuc = tt.id_danh_muc;");
    }
 
   function tintuc_add($tieu_de, $noi_dung, $hinh_anh, $id_danhmuc){
       pdo_execute("INSERT INTO tintuc (`tieu_de`, `noi_dung`, `hinh_anh`, `id_danhmuc`) 
       VALUES (?,?,?,?)", $tieu_de, $noi_dung, $hinh_anh, $id_danhmuc);
       
   }
?>