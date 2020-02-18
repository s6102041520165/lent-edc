<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผู้ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">


    <p>
        <?= Html::a('เพิ่มผู้ใช้', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
    ?>
    <div class="panel">

        <div class="panel-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'username',
                    //'password_hash',
                    //'password_reset_token',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            return ($data->status == 10) ? "ใช้งานได้" : "ใช้งานไม่ได้";
                        }
                    ],
                    //'verification_token',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {delete}',
                    ]

                ],
            ]); ?>
        </div>
    </div>

    <?php Pjax::end(); ?>

</div>