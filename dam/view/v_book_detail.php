  <div class="col-md-9" > 
        <div class="row">
            <div class="col-md-6">
                <img src="upload/product/<?=$ctSach['HinhAnh']?>" class="w-100">
            </div>
            <div class="col-md-6">
              <h2><?=$ctSach['TuaSach']?></h2>
              <div class="row">
                <div class="col-md-6">Tác giả: <strong><?=$ctSach['TacGia']?></strong></div>
                <div class="col-md-6">Chủ đề:<strong><?=$ctSach['TenChuDe']?></strong></div>
              </div>
              <div class="fs-3"><?=$ctSach['TacGia']?></div>
              <small>Còn <?=$ctSach['SoLuong']?> quyển trong thư viện</small> <br>
              <a href="?mod=book&act=addToCart&id=<?=$ctSach['MaSach']?>" class="btn btn-primary">Muợn sách</a> 
              
              <?php if(isset($_SESSION['thongbao'])):?>
                <div class="alert alert-success" role="alert">
                  <?=$_SESSION['thongbao']?>
                </div>
              <?php endif; unset($_SESSION['thongbao']);?>
              <?php if(isset($_SESSION['loi'])):?>
                <div class="alert alert-danger" role="alert">
                  <?=$_SESSION['loi']?>
                </div>
              <?php endif; unset($_SESSION['loi']);?>
              <p class="my-3"><?=$ctSach['MoTa']?></p>
            </div>
        </div>
        
        <h2>Có thể bạn thích đọc</h2>
        <div class="row">
          <?php foreach ($dsNgauNhienCungChuDe as $sach ): ?>
            <div class="col-sm-3">
              <div class="card md-3 " >
                <img src="upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?></p>
                  <a href="?mod=book&act=detail&id=<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
          <?php endforeach;?>
        </div>
        <h2>Cảm nghĩ của bạn đọc</h2>
        <?php if(isset($_SESSION['user'])): ?>
        <form action="" method="post">
            <input type="text" name="NoiDung" class="form-control form-control-lg" placeholder="Cam nghi cua ban">
            <input type="hidden" name="MaSach" value="<?=$ctSach['MaSach'] ?>">
            <button class="btn btn-primary btn-lg mt-2" type="submit">Gui</button>
        </form>
        <?php endif; ?>
        <div class="row my-3 ">
            <div class="col-sm-3">
                <Strong>ABCABC  </Strong>
                <br>
                <i>Đã mượn 1 lần</i>
            </div>
            <div class="col-sm-9">
                Tuyệt vờiiii
            </div>

        </div>
      </div>
    </div>