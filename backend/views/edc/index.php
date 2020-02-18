<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เครื่อง EDC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edc-index">
    <?php Pjax::begin(); ?>
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a('เพิ่มข้อมูลเครื่อง EDC', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]);
            ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'import_date:date',
                    'serial_no',
                    // 'status',

                    'created_at:relativeTime',

                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
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