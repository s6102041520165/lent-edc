<?php

//use yii\grid\GridView;
use yii\helpers\Html;
use kartik\depdrop\DepDrop;
use rmrevin\yii\fontawesome\FA;
use yii\widgets\Pjax;

use kartik\export\ExportMenu;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระบบเบิกจ่ายเครื่อง EDC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lent-index">
    <?php Pjax::begin() ?>
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a(FA::icon('plus') . ' ยืมเครื่อง EDC', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
            <?php
            echo ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['label' => 'วันที่ยืม', 'attribute' => 'lent_date']
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_PDF => [
                        'pdfConfig' => [
                            'methods' => [
                                'SetTitle' => 'Grid Export - Krajee.com',
                                'SetSubject' => 'Generating PDF files via yii2-export extension has never been easy',
                                'SetHeader' => ['Krajee Library Export||Generated On: ' . date("r")],
                                'SetFooter' => ['|Page {PAGENO}|'],
                                'SetAuthor' => 'Kartik Visweswaran',
                                'SetCreator' => 'Kartik Visweswaran',
                                'SetKeywords' => 'Krajee, Yii2, Export, PDF, MPDF, Output, GridView, Grid, yii2-grid, yii2-mpdf, yii2-export',
                            ]
                        ]
                    ],
                ],
                'dropdownOptions' => [
                    'label' => 'Export All',
                    'class' => 'btn btn-secondary'
                ]
            ]);
            ?>
            <?php echo GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'lent_date:date',
                    // ชื่อพนักงาน ยืมคืน
                    [
                        'label' => 'ชื่อจริง - นามสกุล',
                        'attribute' => 'firstname',
                        'value' => function ($data) {
                            return $data->employee['firstname'] . " " . $data->employee['lastname'];
                        }
                    ],
                    ['label' => 'เครื่อง EDC', 'attribute' => 'edc.serial_no'],
                    // status การยืม
                    [
                        'label' => 'สถานะการยืมคืน',
                        'value' => function ($data) {
                            if ($data->status == 1) {
                                return 'กำลังยืม';
                            } else if ($data->status == 2) {
                                return 'คืนแล้ว';
                            }
                        }
                    ],
                    // 'status',
                    //'return_date',
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update} {delete}',
                        'buttons' => [
                            'delete' => function ($url, $model) {
                                return Html::a(FA::icon('trash'), $url, [
                                    'data-confirm' => 'คุณต้องการลบรหัส ' . $model->id . ' ใช่หรือไม่?',
                                    'data-method' => 'post',
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>
    <?php Pjax::end() ?>

</div>