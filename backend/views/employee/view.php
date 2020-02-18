<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */

$this->title = $model->firstname . " " . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('ลบข้อมูล', ['delete', 'id' => $model->id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
])?>
    </p>
    <div class="panel">
        <div class="panel-body">
            <?=DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'firstname',
                    'lastname',
                    'line',
                    'rfid',
                    // ส่วนแสดงอัพเดทแก้ไขเมื่อ
                    'created_at:date',
                    [
                        'attribute' => 'created_by',
                        'value' => function ($data) {
                            return $data->creator['username'];
                        },
                    ],
                    'updated_at:date',
                    [
                        'attribute' => 'updated_by',
                        'value' => function ($data) {
                            return $data->updator['username'];
                        },
                    ],
                ],
            ])?>
        </div>
    </div>
    

</div>
