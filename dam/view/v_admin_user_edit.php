<h2 class="my-3">Sua tai khoan</h2>
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
  <form action="" method="post">
    <div class="mb-3">
      <label for="SoDienThoai" class="form-label" >So Dien Thoai</label>
      <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai" value="<?=$tk['SoDienThoai']?>">
    </div>
    <div class="mb-3">
      <label for="HoTen" class="form-label"> Ho Ten</label>
      <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?=$tk['HoTen']?>">
    </div>
    <div class="mb-3">
      <label for="ViTien" class="form-label">Vi tien</label>
      <input type="number" class="form-control" id="ViTien" name="ViTien" value="<?=$tk['ViTien']?>">
    </div>
    <div class="mb-3">
      <label for="Quyen" class="form-label"> Quyen</label>
      <select class="form-select" name="Quyen">
        <option value="0" <?=($tk['Quyen']==0)?'selected':''?>>Ban doc</option>
        <option value="1" <?=($tk['Quyen']==1)?'selected':''?>>Quan li</option>
        <option value="2" <?=($tk['Quyen']==2)?'selected':''?>>Quan li cap cao</option>
      </select>
    </div>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Xac nhan</button>
  </form>