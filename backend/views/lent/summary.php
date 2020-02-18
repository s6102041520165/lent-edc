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

<?php
    // จำนวนเขตทั้งหมด = $total_district;
    // จำนวนพนักงานทั้งหมด = $total_employee;
    // จำนวนเครื่อง EDC ทั้งหมด = $total_edc;

    // $data_edc = array()
    // ตัวแปร b ไว้ใช้เรียกดึงค่าจาก Array ที่เขตต่าง ๆ 
    $b=0;
    
    $num_edc=[];
    $num_employee=[];
    for($i=0;$i<$total_district;$i++){
        $b=$i;
        $modelLent = (new \yii\db\Query())->from('edc')->where('district_id='.strval($i+1));
        // นำจำนวน edc แต่ละเขตเก็บไว้ในตัวแปร Array $data_edc
        array_push($num_edc,$modelLent->count('*'));

        $modelLent = (new \yii\db\Query())->from('employee')->where('district_id='.strval($i+1));
        // นำจำนวน edc แต่ละเขตเก็บไว้ในตัวแปร Array $data_edc
        array_push($num_employee,$modelLent->count('*'));
    }
?>

<div class="row">
    <div class="col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p><i class="fa fa-user"></i>&nbsp; ข้อมูล</p>
                <p style="margin-bottom:0px;">จำนวนเขตทั้งหมด <?php echo  $total_district ?> เขต</p>
                <p style="margin-bottom:0px;">จำนวนพนักงานทั้งหมด <?php echo  $total_employee ?> คน</p>
                <ul>
                    <?php
                    for($i=0;$i<$total_district;$i++){
                        echo "<li>เขต " .strval($i+1) . " ( จำนวน " . $num_employee[$i] . " คน ) </li>";
                    }
                ?>
                </ul>
                <hr>
                <p style="margin-bottom:0px;">จำนวนเครื่อง EDC ทั้งหมด <?php echo  $total_edc ?> เครื่อง</p>
                <ul>
                    <?php
                    for($i=0;$i<$total_district;$i++){
                        echo "<li>เขต " .strval($i+1) . " ( จำนวน " . $num_edc[$i] . " เครื่อง ) </li>";
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p><i class="fa fa-credit-card"></i>&nbsp; เครือง EDC ทั้งหมด</p>
                <span id="total_active" style="display:none;"> <?php echo $active; ?> </span>
                <span id="total_fix" style="display:none;"> <?php echo $total_fix . ""; ?> </span>
                <span class="badge"></span>
                <canvas id="myChart" width="400" height="400"></canvas>
                <div class="container">
                    <span class="badge" style="background-color:#ffce56;">จำนวนเครื่องที่ใช้งานได้
                        <?php echo $active; ?> </span> &nbsp;
                    <span class="badge" style="background-color:#ff9f40;">จำนวนเครื่องที่กำลังซ่อม
                        <?php echo $total_fix; ?> </span>
                </div>


                <script>
                var data1 = Number(document.getElementById('total_active').innerHTML);
                var data2 = Number(document.getElementById('total_fix').innerHTML);

                var total_edc = "จำนวนเครื่อง EDC ทั้งหมด " + (Number(data1) + Number(data2)) + " เครื่อง";

                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    // type: 'bar',
                    data: {
                        labels: ['เครื่องที่ใช้งานได้', 'เครื่องที่ทำการส่งซ่อม'],
                        datasets: [{
                            label: total_edc,
                            barPercentage: 0.5,
                            data: [data1, data2],
                            backgroundColor: [
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                            ],
                            borderColor: [
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 159, 64, 1)',
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
    <div class="col-lg-4">
        <div class="thumbnail">
            <div class="caption">
                <p><i class="fa fa-book"></i>&nbsp; เครือง Edc เบิกจ่าย</p>
                <div class="row">
                    <div class="container">
                        <span class="badge" style="background-color:#ffce56;">จำนวนเครื่องที่ยังไม่คืน
                            <?php echo $lent; ?> </span> &nbsp;
                        <span class="badge" style="background-color:#4bc0c0;">จำนวนเครื่องที่คืนแล้ว
                            <?php echo $total_rent; ?> </span>
                    </div>
                </div>


                <?=ChartJs::widget([
                    'type' => 'doughnut',
                    'options' => [
                        'height' => '200px',
                        'width' => '500px',
                    ],
                    'data' => [
                        // 'labels' => ["พนักงานยืมเครื่อง EDC", "เครื่อง EDC พร้อมใช้งาน"],
                        'datasets' => [
                            [
                                'label' => "My First dataset",
                                'backgroundColor' => [
                                    '#ffce56',
                                    '#4bc0c0',
                                ],
                                'pointBackgroundColor' => "rgba(255, 206, 86, 0.2)",
                                'pointBorderColor' => "#fff",
                                'pointHoverBackgroundColor' => "#fff",
                                'pointHoverBorderColor' => "rgba(255, 159, 64, 0.2)",
                                'data' => [$lent, $total_rent],
                            ],
                        ],
                    ],
                ]);
                ?>
            </div>
        </div>
    </div>
</div>