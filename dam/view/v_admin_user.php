<h2 class="my-3">Tai khoan</h2>
    <a href="?mod=admin&act=user_add" class="btn btn-success">Them tai khoan</a>
    <table class="table text-center align-middle" >
        <thead>
        <tr class="">
            <th>STT</th>
            <th>Anh</th>
            <th class="text-start">Ho ten</th>
            <th>SDT</th>
            <th>Quyen</th>
            <th class="text-end">Hanh dong</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; foreach($dsTk as $tk):?>
            <tr>
                <td><?=$i?></td>
                <td><img src="upload/avatar/<?=$tk['HinhAnh']?>" alt="" style="width: 100px;"></td>
                <td class="text-start" ><?=$tk['HoTen']?></td>
                <td><?=$tk['SoDienThoai']?></td>
                <td>
                    <?php 
                        switch ($tk['Quyen']) {
                            case '2':
                                echo'<span class="badge text-bg-danger">quan li cap cao </span>';
                                break;
                            case '1':
                                echo'<span class="badge text-bg-success">quan li </span>';
                                break;
                            default:
                                echo'<span class="badge text-bg-primary">ban doc </span>';
                                break;
                        }
                    ?>
                </td>
                <td class="text-end">
                <a href="?mod=admin&act=user_edit&id=<?=$tk['MaTK']?>" class="btn btn-warning">sua</a>
                <a href="?mod=admin&act=user_delete&id=<?=$tk['MaTK']?>" onclick="return confirm('ban co muon xoa khong')" class="btn btn-danger">xoa</a>
                </td>
            </tr>
        <?php $i++; endforeach?>
        </tbody>
    </table>

    