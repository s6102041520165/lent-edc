<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */

$this->title = $model->serial_no;
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
                        'attribute' => 'district.name'
                    ],
                    [
                        'attribute' => 'division.name'
                    ],
                    // ส่วนแสดงอัพเดทแก้ไขเมื่อ
                    'created_at:datetime',
                    [
                        'attribute' => 'created_by',
                        'value' => function ($data) {
                            return $data->creator['username'];
                        },
                    ],
                ]
            ]); ?>
        </div>
    </div>
    

</div>