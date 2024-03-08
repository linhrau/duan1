<h2 class="my-3">Tong quan</h2>
    <div class="row">
    <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">dau sach </h5>
                    <p class="card-text fs-1 text-center"><?=$tkSach?></p>
                </div>
            </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">ban doc </h5>
                <p class="card-text fs-1 text-center"><?=$tkBanDoc?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-secondary mb-3">
            <div class="card-body">
                <h5 class="card-title">chu de </h5>
                <p class="card-text fs-1 text-center"><?=$tkChuDe?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">luot muon </h5>
                <p class="card-text fs-1 text-center"><?=$tkLuotMuon?></p>
            </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>Thong ke sach theo chu de</strong>
                </div>
                <div class="card-body">
                <div id="myChart" style=" height:400px"></div>
                    <table class="table">
                        <thead>
                           <tr>
                                <th>Chu de</th>
                                <th>So luong sach</th>
                                <th>gia trung binh</th>
                                <th>gia thap nhat</th>
                                <th>gia cao nhat</th>
                           </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tkSachTheoChuDe as $cd):?>
                                <tr>
                                    <td><?=$cd['TenChuDe']?></td>
                                    <td><?=$cd['SoLuong']?></td>
                                    <td><?=number_format(round(max(500,$cd['TrungBinh']*0.5/100)))?></td>
                                    <td><?=number_format(round(max(500,$cd['ThapNhat']*0.5/100)))?></td>
                                    <td><?=number_format(round(max(500,$cd['CaoNhat']*0.5/100)))?></td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card-header">
                <strong>Thong ke doanh thu</strong>
            </div>
            <div class="card-body">
                <div id="myChart2" style=" height:400px"></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thang/Nam</th>
                            <th>So ban doc</th>
                            <th>Luot muon</th>
                            <th>So sach muon</th>
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tkDoanhThu as $dt):?>
                        <tr>
                            <td><?=$dt['Thang']?>/<?=$dt['Nam']?></td>
                            <td><?=$dt['SoBanDoc']?></td>
                            <td><?=$dt['SoLuotMuon']?></td>
                            <td><?=$dt['SoSachMuon']?></td>
                            <td><?=number_format($dt['DoanhThu'])?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        google.charts.load('current',{packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        // Your Function
        function drawChart() {
            const data = google.visualization.arrayToDataTable([
                ['Chu de', 'So luong'],
                <?php foreach($tkSachTheoChuDe as $cd)
                {
                    echo "['".$cd['TenChuDe']."',".$cd['SoLuong']."],";
                }
                ?>
                
                
                ]);

                // Set Options
                const options = {
                title:'Bieu do so luong sach theo chu de'
                };

                // Draw
                const chart = new google.visualization.PieChart(document.getElementById('myChart'));
                chart.draw(data, options);


                //bang 2
                const data2 = google.visualization.arrayToDataTable([
                ['Thang/Nam', 'Doanh thu'],
                <?php foreach($tkDoanhThu as $dt)
                {
                    echo "['".$dt['Thang']."/".$dt['Nam']."',".$dt['DoanhThu']."],";
                }
                ?>
                ]);

                // Set Options
                const options2 = {
                title:'Bieu do thong ke doanh thu'
                };

                // Draw
                const chart2 = new google.visualization.ColumnChart(document.getElementById('myChart2'));
                chart2.draw(data2, options2);
        }
    </script>