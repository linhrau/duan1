<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH TIN TỨC</h1>
    </div>
 
                <a href="?mod=admin&act=tintuc_add" class="btn btn-success">Them tin tuc</a>
     
    <table class="table text-center align-middle" >
        <thead>
        <tr class="">
        <th>id</th>
            <th>TIÊU ĐỀ</th>
            <th>NỘI DUNG</th>
            <th>HÌNH ẢNH</th>
            <th>DANH MỤC</th>
            <th>HANH DONG</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($dsTt as $tt):?>
            <tr>
            <td><?=$tt['id']?></td>
                <td><?=$tt['tieu_de']?></td>
                <td><?=$tt['noi_dung']?></td>
                <td><img src="upload/product/<?=$tt['hinh_anh']?>" alt="" style="width: 100px;"></td>
                <td><?=$tt['id_danh_muc']?></td>
                <td class="text-end">
                <a href="?mod=admin&act=tintuc_edit&id=<?=$tt['id']?>" class="btn btn-warning">sua</a>
                <a href="?mod=admin&act=tintuc_delete&id=<?=$tt['id']?>" onclick="return confirm('ban co muon xoa khong')" class="btn btn-danger">xoa</a>
                </td>
            </tr>
        <?php $i++; endforeach?>
        </tbody>
    </table>
    <div class="row mb10">