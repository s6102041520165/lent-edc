<?php

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เขต พกส.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index">

    <p>
        <?= Html::a('เพิ่มเขต พกส.', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin() ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',

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
    <?php Pjax::end(); ?>

</div>