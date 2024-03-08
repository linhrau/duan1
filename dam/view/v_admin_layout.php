<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan li thu vien LTL Lib</title>
    <link rel="stylesheet" href="template/bootstrap-5.3.2-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0 bg-primary collapse collapse-horizontal show" style="min-height:100vh" id="openMenu">
                <strong class="text-center p-3 d-block text-white">TRANG QUẢN LÍ</strong>
                <div class="list-group list-group-item-primary m-3">
                    <a href="?mod=admin&act=dashboard" class="list-group-item list-group-item-action <?=(strpos($view_name,'dashboard'))?'active':''?> ">Tổng quan</a>
                    <a href="?mod=admin&act=user" class="list-group-item list-group-item-action <?=(strpos($view_name,'user'))?'active':''?>">Tài khoản</a>
                    <a href="?mod=admin&act=tintuc" class="list-group-item list-group-item-action <?=(strpos($view_name,'category'))?'active':''?>">tintuc</a>
                    <a href="?mod=admin&act=book" class="list-group-item list-group-item-action <?=(strpos($view_name,'book'))?'active':''?>">Sách</a>
                    <a href="?mod=admin&act=history" class="list-group-item list-group-item-action <?=(strpos($view_name,'history'))?'active':''?>" >Mượn trả</a>
                </div>
            </div>
            <div class="col-md p-0">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">
                        <button class="btn btn-outline me-2" type="button" data-bs-toggle="collapse" data-bs-target="#openMenu" aria-expanded="false" aria-controls="collapseWidthExample">
                           =
                          </button>
                      <a class="navbar-brand" href="#">LTL Lib</a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Xin chào, <?=$_SESSION['user']['HoTen']?>
                            </a>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="?mod=page&act=home">Xem trang chu</a></li>
                              <li><a class="dropdown-item" href="?mod=user&act=logout">đăng xuất</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                </nav>
                <div class="container">
                <?php 
                    include_once 'view/v_'.$view_name.'.php';
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="template/bootstrap-5.3.2-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>