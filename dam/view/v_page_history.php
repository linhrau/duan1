<h2>CHI TIET LICH SU MUON SACH</h2>

    <table class="table text-center">
        <thead>
            <tr>
                <th>Ma muon sach</th>
                <th>Ngay muon</th>
                <th>Ngay tra</th>
                <th>So sach muon</th>
                <th>Tong tien</th>
                <th>Trang thai</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dsLichSu as $ls):?>
                <tr>
                    <td><?=$ls['MaLS']?></td>
                    <td><?=$ls['NgayMuon']?></td>
                    <td><?=$ls['NgayTra']?></td>
                    <td><?=$ls['SoSachMuon']?></td>
                    <td><?=$ls['TongTien']?></td>
                    <td>
                        <?php
                        switch ($ls['TrangThai']) {
                            case 'chuan-bi':
                                echo '<span class="badge text-bg-primary">Da tiep nhan</span>';
                                break;
                            case 'cho-giao':
                                echo '<span class="badge text-bg-success">Da co sach</span>';
                                break;
                            case 'dang-muon':
                                echo '<span class="badge text-bg-info">Dang muon sach</span>';
                                break;
                            case 'da-tra':
                                echo '<span class="badge text-bg-secondary">Da tra sach</span>';
                                break;
                            default:
                                # code...
                                break;
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
  