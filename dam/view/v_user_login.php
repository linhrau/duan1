<h2>Dang nhap</h2>
<?php if(isset($_SESSION['loi'])):?>
    <div class="alert alert-danger" role="alert">
       <?=$_SESSION['loi']?>
    </div>
<?php endif; unset($_SESSION['loi']);?>
        <form action="" method="post" >
            <form>
                <div class="mb-3">
                  <label for="phone" class="form-label">Số điện thoại</label>
                  <input type="text" class="form-control" id="phone"  name="soDienThoai">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label" >Password</label>
                  <input type="password" class="form-control" id="password" name="matKhau">
                </div>
                
                <button type="submit" class="btn btn-primary">Dang nhap</button>

              </form>
        </form>