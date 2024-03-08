<h2>Sách nổi bật</h2>
  <div class="row">
          <?php foreach ($dsGhim as $sach): ?>
            <div class="col-sm-3">
              <div class="card mb-3 ">
                <img src="upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?></p>
                  <a href="?mod=book&act=detail&id=<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <h2>Sách mới</h2>
        <div class="row">
          <?php foreach ($dsMoi as $sach): ?>
            <div class="col-sm-3">
              <div class="card mb-3 ">
                <img src="upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?></p>
                  <a href="?mod=book&act=detail&id=<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        </div>
        