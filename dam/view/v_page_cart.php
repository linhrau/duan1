<h2>Gio hang</h2>
<?php if(isset($_SESSION['thongbao'])):?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['thongbao']?>
                </div>
              <?php endif; unset($_SESSION['thongbao']);?>
<form action="?mod=book&act=updateCart" method="post">
    <input type="hidden" name="SoSachMuon" id="SoSachMuon">
    <input type="hidden" name="TongTien" id="TongTien">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">NGAY DU KIEN MUON</span>
                <input type="datetime" name="NgayMuon" id="NgayMuon" 
                value="<?=$GioSach['NgayMuon']?>" class="form-control" onchange="tinhThanhTien()">
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">NGAY DU KIEN TRA</span>
                <input type="datetime" name="NgayTra" id="NgayTra" 
                value="<?=$GioSach['NgayTra']?>" class="form-control" onchange="tinhThanhTien()">
            </div>
        </div>
    </div>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Ảnh</th>
                <th>Tựa sách</th>
                <th>Giá trị</th>
                <th>Giá mượn</th>
                <th>Thành tiền</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ctGioSach as $item):?>
                <tr>
                    <td><img src="upload/product/<?=$item['HinhAnh']?>" class="rounded-3" style="width: 50px" alt=""></td>
                    <td><?=$item['TuaSach']?></td>
                    <td><?=$item['GiaTri']?>d</td>
                    <td><?=max($item['GiaTri']*0.5/100,500)?>d</td>
                    <td></td>
                    <td>
                        <a href="?mod=book&act=removeFormCart&id=<?=$item['MaSach']?>" class="btn btn-outline-danger btn-sm">XOA</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4">TONG THANH TIEN</th>
                <th>0d</th>
                <th>
                <a href="?mod=book&act=removeCart" class="btn btn-outline-danger btn-sm">XOA HET</a>
                </th>
            </tr>
        </tfoot>
    </table>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    XAC NHAN MUON
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">XAC NHAN MUON</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            DONG Y VOI QUY DINH VA CHI PHI MMUON SACH CUA THU VIEN
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">HUY</button>
            <button type="submit" class="btn btn-primary">DONG Y</button>
        </div>
        </div>
    </div>
    </div>

</form>


<script>
    function tinhThanhTien(){
        var dsSach = document.querySelectorAll('table tbody tr');
        var ngayMuon = document.querySelector("#NgayMuon").value;
        var ngayTra = document.querySelector("#NgayTra").value;
        var soNgayMuon = (new Date(ngayTra) - new Date(ngayMuon))/(24*60*60*1000);
        var tong=0;
        for (const sach of dsSach) {
            var gia = Number(sach.querySelector('td:nth-child(4)').innerText.replace('d',''));
            var tien = soNgayMuon*gia;
            sach.querySelector('td:nth-child(5)').innerText= tien + 'd';
            tong+=tien;
        }
        document.querySelector('tfoot th:nth-child(2)').innerText=tong+'d';
        document.querySelector('#SoSachMuon').value=dsSach.length;
        document.querySelector('#TongTien').value=tong;

    }
    tinhThanhTien();
</script>