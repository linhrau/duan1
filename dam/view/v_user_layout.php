<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thu vien LTL Lib</title>
    <link rel="stylesheet" href="template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="?mod=page&act=home">LTL Lib</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?mod=page&act=home">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="?mod=page&act=tintuc">Ttinuc</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Chủ đề
                </a>
                <ul class="dropdown-menu">
                  <?php foreach ($dsChuDe as $chude): ?>
                    <li><a class="dropdown-item" href="?mod=category&act=detail/<?=$chude['MaCD']?>"><?=$chude['TenChuDe']?></a></li>
                  <?php endforeach; ?>
                </ul>
              </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item">
                  <!-- <a class="nav-link " aria-current="page" href="<?=$base_url?>page/cart">Giỏ sách</a> -->
                  <a class="nav-link " aria-current="page" href="?mod=page&act=cart">Giỏ sách</a>
                </li>
                <?php if(!isset($_SESSION['user'])):?>
                  <li class="nav-item">
                  <a class="nav-link " aria-current="page" href="?mod=user&act=login">Dang nhap</a>
                </li>
                <?php else:?>
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Xin chào, <?= $_SESSION['user']['HoTen'] ?>
                  </a>
                  <ul class="dropdown-menu end-0"  style="left: auto">
                    <li><a class="dropdown-item" href="#">Thông tin tài khoản</a></li>
                    <li><a class="dropdown-item" href="?mod=page&act=history&user_id=<?= $_SESSION['user']['MaTK'] ?>">Lịch sự mượn sách</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if($_SESSION['user']['Quyen'] >= 1): ?>
                    <li><a class="dropdown-item text-warning" href="?mod=admin&act=dashboard">Trang quan li</a></li>
                    <?php endif; ?>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="?mod=user&act=logout">Đăng xuất</a></li>
                    
                  </ul>
                </li>
                </li>
                <?php endif; ?>
               
                
              </ul>
          </div>
        </div>
      </nav>
    <div class="container">
     
        <div id="carouselExample" class="carousel slide mt-3 mb-3 ">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="template/img/1.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="template/img/2.jpg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="template/img/3.jpg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
      
    </div>

  <div class=" ms-5">
    <div class="row my-3 ms-5">
      <div class="col-md-3">
        <form action="?mod=book&act=search" method="POST" class="mb-3 ">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="keyword" placeholder="Nhập tựa sách cần tìm">
            <button class="btn btn-outline-secondary" type="submit" id="search">Tìm</button>
          </div>
        </form>
        <ul class="list-group mb-3">
          <li class="list-group-item active" aria-current="true">Sách đọc nhiều</li>
          
          <?php foreach ($dsDocNhieu as $sach): ?>
            <li class="list-group-item"><?=$sach['TuaSach']?></li>
          <?php endforeach;?>
        </ul>
      </div>
      <div class="col-md-9">
        <!-- //aaaa -->
       <?php 
        include_once('view/v_'.$view_name.'.php');
        ?>
      </div>
    </div>
  </div>

    <footer class=" text-center  p-3">
      LINHNT_PH45998
    </footer>
  </div>

    <script src="template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>