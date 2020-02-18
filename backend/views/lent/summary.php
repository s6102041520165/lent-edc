<?php
use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = 'สรุปข้อมูลการยืมคืน';
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
    integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<div class="row">
    <div class="col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p><i class="fa fa-user"></i> พนักงานทั้งหมด</p>
                <h1 class="text-center"><?php echo  $total_employee ?></h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p><i class="fa fa-credit-card"></i> เครือง EDC ทั้งหมด</p>
                <span class="badge" style="display:none;" id="total_active">
                    <?php echo $active; ?>
                </span>
                <span class="badge" style="display:none;" id="total_fix">
                    <?php echo $total_fix . ""; ?>
                </span>
                <span class="badge"></span>
                <canvas id="myChart" width="400" height="400"></canvas>
                <script>
                var data1 = document.getElementById('total_active').innerHTML;
                var data2 = document.getElementById('total_fix').innerHTML;
                var total_edc = "จำนวนเครื่อง EDC ทั้งหมด " + (Number(data1) + Number(data2)) + " เครื่อง";

                var ctx = document.getElementById('myChart');
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: '# of Votes',
                            data: [12, 19, 3, 5, 2, 3],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
                </script>
            </div>
        </div>
    </div>

</div>
<div class="panel">
    <div class="panel-body">

    </div>
</div>
<div class="lent-summary">
    <?=ChartJs::widget([
        'type' => 'pie',
        'options' => [
            'height' => '200px',
            'width' => '500px',
        ],
        'data' => [
            'labels' => ["พนักงานยืมเครื่อง EDC", "เครื่อง EDC พร้อมใช้งาน"],
            'datasets' => [
                [
                    'label' => "My First dataset",
                    'backgroundColor' => [
                        'red',
                        '#99C08E',
                    ],
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                    'data' => [$lent, $active],
                ],
            ],
        ],
    ]);
    ?>
</div>