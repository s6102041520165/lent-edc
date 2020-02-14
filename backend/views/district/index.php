<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DistrictSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เขต กพส.';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="district-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <p>
        <?= Html::a('เพิ่มเขต กพส.', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="panel">
        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'name',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
