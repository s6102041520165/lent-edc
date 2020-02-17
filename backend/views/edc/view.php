<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */

$this->title = 'ข้อมูลเครื่อง EDC';
$this->params['breadcrumbs'][] = ['label' => 'Edcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="edc-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel">
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',

                    'serial_no',
                    'import_date:date',
                    // status ของเครื่อง EDC
                    [
                        'attribute' => 'status',
                        'value' => function ($data) {
                            if ($data->status == 1) {
                                return 'สามารถยืมได้';
                            } else if ($data->status == 2) {
                                return 'เครื่องส่งซ่อม';
                            }
                        },
                    ],
                    [
                        'attribute' => 'district_id',
                        'value' => function($data){
                            return $data->district['name'];
                        }
                    },
                ],
                
                [
                    'label' => 'เขต กพส.',
                    'value' => function ($data) {
                        return $data->district_id;
                    },
                ],
                // ส่วนแสดงอัพเดทแก้ไขเมื่อ
                'created_at:datetime',
                [
                    'attribute' => 'created_by',
                    'value' => function ($data) {
                        return $data->creator['username'];
                    },
                ],
            ]) ?>
        </div>
    </div>


</div>