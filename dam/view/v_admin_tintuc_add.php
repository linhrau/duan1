 <h2 class="my-3">Them </h2>

  <form action="" method="post">
    <div class="mb-3">
      <label  class="form-label" >tieude</label>
      <input type="text" class="form-control" id="tieu_de" name="tieu_de">
    </div>
    <div class="mb-3">
      <label class="form-label"> noi_dung</label>
      <input type="text" class="form-control" id="noi_dung" name="noi_dung">
    </div>
    <div class="mb-3">
      <label class="form-label">hinh_anh</label>
      <input type="file" name="hinh_anh" accept="/upload">
    </div>
    <div class="mb-3">
    <label  class="form-label">Danh mục</label>
    <select name="id_danh_muc">
        <?php foreach ($danhmuc as $dm){
            extract($dm);
            echo "<option value = $id_danhmuc>$ten_danhmuc</option>";
        }
        ?>
    </select>
</div>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Xac nhan</button>
  </form>