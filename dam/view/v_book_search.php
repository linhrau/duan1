<h2>ket qua tim kiem voi tu khoa"<?=$_POST['keyword']?>"</h2>
  <div class="row">
          <?php foreach ($ketqua as $sach): ?>
            <div class="col-sm-3">
              <div class="card mb-3 ">
                <img src="<?=$base_url?>upload/product/<?=$sach['HinhAnh']?>" class="card-img-top" alt="">
                <div class="card-body">
                  <h5 class="card-title"><?=$sach['TuaSach']?></h5>
                  <p class="card-text"><?=$sach['GiaTri']?></p>
                  <a href="<?=$base_url?>book/detail/<?=$sach['MaSach']?>" class="btn btn-primary">Mượn</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>