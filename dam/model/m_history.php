<?php
//thao tac du lieu trong csdl
    include_once "model/m_pdo.php";
    
    function history_hasCart($MaTK){
        return pdo_query_one("SELECT * FROM lichsu WHERE MaTK = ? AND TrangThai = ?", $MaTK,'gio-sach');
    }
    function history_add($MaTK){
        pdo_execute("INSERT INTO lichsu(`MaTK`,`NgayMuon`,`NgayTra`,`TrangThai`) 
        VALUES(?,?,?,?)",$MaTK,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'),'gio-sach');
    }
    function history_addToCart($MaLS,$MaSach){
        pdo_execute("INSERT INTO chitietlichsu (`MaLS`,`MaSach`) VALUES(?,?)",$MaLS,$MaSach);
    }

    function history_getCart($MaTK){
        return pdo_query("SELECT * FROM lichsu ls INNER JOIN chitietlichsu ct ON ls.MaLS = ct.MaLS
        INNER JOIN sach s ON ct.MaSach = s.MaSach WHERE ls.MaTK = ? AND ls.TrangThai = ?", $MaTK,'gio-sach');
    }
    function history_removeFormCart($MaLS,$MaSach){
        pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ? AND MaSach = ?",$MaLS,$MaSach);
    }
    function history_removeCart($MaLS){
        pdo_execute("DELETE FROM chitietlichsu WHERE MaLS = ?",$MaLS);
    }
    function history_updateCart($MaLS,$NgayMuon,$NgayTra,$SoSachMuon,$TongTien,$TrangThai){
        pdo_execute("UPDATE lichsu SET NgayMuon = ?,NgayTra = ?,SoSachMuon = ?,TongTien = ?,TrangThai = ?
        WHERE MaLS = ?",$NgayMuon,$NgayTra,$SoSachMuon,$TongTien,$TrangThai,$MaLS);
    }
    function history_getAllByAccount($MaTK){
        return pdo_query("SELECT * FROM lichsu WHERE MaTK = ?",$MaTK);
    }
    function history_count(){
        return pdo_query_value("SELECT COUNT(*) FROM lichsu");
    }
    function history_stat(){
        return pdo_query("SELECT YEAR(NgayTra) AS Nam, MONTH(NgayTra) AS Thang,COUNT(DISTINCT MaTK) AS SoBanDoc, COUNT(MaLS) AS SoLuotMuon,SUM(SoSachMuon) AS SoSachMuon,SUM(TongTien) AS DoanhThu
        FROM lichsu
        GROUP BY YEAR(NgayTra), MONTH(NgayTra);");
    }
?>