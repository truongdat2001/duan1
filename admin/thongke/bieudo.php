<div id="myChart" style="margin-left: 20%;width:100%; max-width:600px; height:500px;">
</div>

<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
                $tongdm = count($listthongke);
                $i = 1;
                foreach ($listthongke as $thongke) {
                    extract($thongke);
                    if ($i == $tongdm) {
                        $dauphay = "";
                    } else {
                        $dauphay = ",";
                    }
                    echo " ['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                    $i += 1;
                }
            ?>
        ]);

        // Set Options
        var options = {
            title: 'Thống kê sản phẩm theo danh mục'
        };

        // Draw
        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);

    }
</script>