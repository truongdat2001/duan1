<div id="myChart" style="margin-left: 20%;width:100%; max-width:900px; height:500px;">
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm', 'Tổng giá trị'],
            <?php
                $tongdm = count($listthongke);
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    echo " ['" . $thongke['tendm'] . "', " . $thongke['countsp'] . ", " . $thongke['giatrungbinh'] . "],";
                }
            ?>
        ]);

        // Set Options
        var options = {
            title: 'Thống kê sản phẩm theo danh mục',
            hAxis: {title: 'Số lượng sản phẩm'},
            vAxis: {title: 'Tổng giá trị'},
            bubble: {textStyle: {fontSize: 11}}
        };

        // Draw
        var chart = new google.visualization.BubbleChart(document.getElementById('myChart'));
        chart.draw(data, options);

    }
</script>