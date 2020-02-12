<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lent-index">
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a('ยืมเครื่อง EDC', ['create'], ['class' => 'btn btn-success']) ?>
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

                    'id',
                    'lent_date',
                    'employee_id',
                    'edc_id',
                    'status',
                    //'return_date',
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>


</div>