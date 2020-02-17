<?php
use yii\helpers\Html;
use dosamigos\chartjs\ChartJs;
/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = 'สรุปข้อมูลการยืมคืน';
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>

<div class="lent-summary">
    <?= ChartJs::widget([
        'type' => 'pie',
        'options' => [
            'height' => '200px',
            'width' => '500px'
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
                    'data' => [$lent, $active]
                ]
            ]
        ]
    ]);
    ?>
</div>