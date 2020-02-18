<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Edcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="edc-view">


    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการลบข้อมูลใช่หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'serial_no',
            'import_date:date',
            [
                'attribute' => 'status',
                'value' => function ($data) {
                    return ($data->status == 1) ? "ใช้งานได้" : "ส่งซ่อม";
                }
            ],
            [
                'attribute' => 'district_id',
                'value'=>function($data){
                    return $data->district['name'];
                }
            ],
            'created_at:relativeTime',
            [
                'attribute' => 'created_by',
                'value'=>function($data){
                    return $data->creator['username'];
                }
            ],
            'updated_at:relativeTime',
            [
                'attribute' => 'updated_by',
                'value'=>function($data){
                    return $data->updator['username'];
                }
            ],
        ],
    ]) ?>

</div>