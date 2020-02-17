<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
                <?= Html::a('เพิ่มพนักงาน', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">
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
                            return $data->firstname." ".$data->lastname;
                        }
                    ],
                    'line',
                    'created_at:relativeTime',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => (Yii::$app->user->can('deleteEmployee'))? "{view} {update}": "{view} {update} {delete}",
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


</div>