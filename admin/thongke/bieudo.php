<style>
    :root {
        --gold-primary: #b8860b;
        --gold-dark: #8b6914;
        --gold-darker: #6d5419;
        --brown-primary: #5d4e37;
        --cream-light: #faf8f3;
        --cream-medium: #f5f1e8;
        --cream-dark: #e8dcc8;
        --cream-accent: #fff9e6;
        --tan: #d4a574;
        --text-primary: #3e2723;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Times New Roman', serif;
        background: linear-gradient(135deg, var(--cream-medium) 0%, var(--cream-dark) 100%);
        padding: 10px;
        min-height: 100vh;
    }

    /* Căn rộng 100% màn hình */
    .row {
        width: 100%;
        max-width: 100% !important;
        margin: 0 auto;
    }

    /* ==================== TITLE ==================== */
    .frmtitle {
        background: linear-gradient(135deg, var(--gold-dark) 0%, var(--gold-darker) 100%);
        padding: 20px 30px;
        border-bottom: 5px solid var(--tan);
        border-radius: 10px 10px 0 0;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .frmtitle h1 {
        font-size: 1.6em;
        color: var(--cream-accent);
        text-transform: uppercase;
        text-align: center;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    /* ==================== CONTENT ==================== */
    .frmcontent {
        padding: 30px;
        background: linear-gradient(135deg, var(--cream-light) 0%, var(--cream-medium) 100%);
        border-radius: 0 0 10px 10px;
        box-shadow: 0 6px 20px rgba(93, 78, 55, 0.15);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Khung chứa biểu đồ rộng 100% */
    #myChart {
        width: 100%;
        max-width: 1200px;
        /* Giới hạn nhẹ để biểu đồ không bị quá dẹt trên màn hình cực lớn */
        height: 600px;
        background-color: white;
        border-radius: 12px;
        padding: 20px;
        border: 1px solid var(--tan);
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.05);
    }

    /* ==================== BUTTONS ==================== */
    .btn-back {
        margin-top: 30px;
        padding: 12px 30px;
        background: linear-gradient(135deg, var(--brown-primary) 0%, #3e2723 100%);
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        transition: 0.3s;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        display: inline-block;
    }

    .btn-back:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        filter: brightness(1.2);
        color: white;
    }
</style>

<div class="row">
    <div class="row frmtitle">
        <h1><i class="fas fa-chart-pie"></i> BIỂU ĐỒ TỶ TRỌNG SẢN PHẨM</h1>
    </div>

    <div class="row frmcontent">
        <div id="myChart"></div>

        <div class="row" style="text-align: center;">
            <a href="index.php?act=thongke" class="btn-back">
                <i class="fas fa-arrow-left"></i> Quay lại trang thống kê
            </a>
        </div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Danh mục', 'Số lượng sản phẩm'],
            <?php
            $tong = count($listthongke);
            $i = 1;
            foreach ($listthongke as $tk) {
                extract($tk);
                if ($i == $tong)
                    $comma = "";
                else
                    $comma = ",";
                // Sử dụng tendm và countsp từ câu truy vấn SQL đã sửa theo DB của bạn
                echo "['" . $tendm . "', " . $countsp . "]" . $comma;
                $i++;
            }
            ?>
        ]);

        var options = {
            title: 'Tỷ lệ sản phẩm theo từng danh mục sách',
            is3D: true, // Hiệu ứng 3D sang trọng
            pieHole: 0.4, // Nếu muốn đổi thành biểu đồ vòng (Donut), chỉnh số này (0.0 - 1.0)
            backgroundColor: 'transparent',
            // Bộ màu Gold - Brown đồng bộ giao diện
            colors: ['#b8860b', '#8b6914', '#5d4e37', '#d4a574', '#3e2723', '#a93226'],
            chartArea: {
                width: '100%',
                height: '80%'
            },
            legend: {
                position: 'right',
                textStyle: {
                    color: '#3e2723',
                    fontSize: 14
                }
            },
            titleTextStyle: {
                color: '#8b6914',
                fontSize: 22,
                bold: true,
                fontName: 'Times New Roman'
            }
        };

        var chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }

    // Tự động vẽ lại khi thay đổi kích thước màn hình (Responsive)
    window.onresize = drawChart;
</script>