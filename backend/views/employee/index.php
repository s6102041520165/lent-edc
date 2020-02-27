<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use kartik\grid\GridView;
use Mpdf\Tag\BarCode;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'พนักงาน ขสมก.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-index">
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a(FA::icon('user-plus').' เพิ่มพนักงาน', ['create'], ['class' => 'btn btn-success']) ?>
                <?= Html::a(FA::icon('download').' ดาวน์โหลดบาร์โค๊ด', ['barcode'], ['class' => 'btn btn-success']) ?>
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
                    //['label' => 'วันที่ยืม', 'attribute' => 'lent_date'],
                    // 'id',
                    [
                        'attribute' => 'id',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return '<barcode code="' . $data->id . '" type="c93" />';
                        }
                    ],
                    [
                        'label' => 'ชื่อจริง - นามสกุล',
                        'value' => function ($data) {
                            return $data->firstname . " " . $data->lastname;
                        }
                    ],
                    'line',
                    'district.name',
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_TEXT => false,
                    ExportMenu::FORMAT_HTML => false,
                    ExportMenu::FORMAT_EXCEL => false,
                    ExportMenu::FORMAT_PDF => [
                        'pdfConfig' => [
                            'methods' => [
                                'SetTitle' => 'รายชื่อพนักงาน ขสมก.',
                                'SetSubject' => 'รายชื่อพนักงาน ขสมก.',
                                'SetHeader' => ['Export||Generated On: ' . date("r")],
                                'SetFooter' => ['|หน้า {PAGENO}|'],
                                'SetAuthor' => 'Tar and Petch',
                                'SetCreator' => 'Tar and Petch',
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
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    
                    [
                        'label' => 'ชื่อจริง - นามสกุล',
                        'attribute' => 'firstname',
                        'value' => function ($data) {
                            return $data->firstname . " " . $data->lastname;
                        }
                    ],
                    'line',
                    'district.name',
                    'created_at:relativeTime',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => (Yii::$app->user->can('deleteEmployee')) ? "{view} {update}" : "{view} {update} {delete}",
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


</div>