<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = $model->edc['serial_no'];
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lent-view">


    <p>
        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการลบข้อมูลใช่หรือไม่ ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="panel">
        <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    [
                        'label' => 'ชื่อจริง - นามสกุล',
                        'attribute' => 'employee_id',
                        'value' => function ($data) {
                            return $data->employee['firstname'] . " " . $data->employee['lastname'];
                        }
                    ],
                    ['label' => 'เครื่อง EDC', 'attribute' => 'edc.serial_no'],
                    // status การยืม
                    [
                        'label' => 'สถานะการยืมคืน',
                        'value' => function ($data) {
                            if ($data->status == 1) {
                                return 'กำลังยืม';
                            } else if ($data->status == 2) {
                                return 'คืนแล้ว';
                            }
                        },
                    ],
                    'return_date:relativeTime',

                    // ส่วนอัพเดทแก้ไขเมื่อ
                    'created_at:relativeTime',
                    [
                        'attribute' => 'created_by',
                        'value' => function ($data) {
                            return $data->creator['username'];
                        },
                    ],
                    'updated_at:relativeTime',
                    [
                        'attribute' => 'updated_by',
                        'value' => function ($data) {
                            return $data->updator['username'];
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>