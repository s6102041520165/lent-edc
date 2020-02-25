<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'firstname') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'lastname') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'line') ?>
        </div>
        <div class="col-lg-6">
            <?php
                // $data = ArrayHelper::map(District::find()->all(), 'id', 'name');
                // // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                // echo '<label class="control-label">เขต พกส.</label>';
                // echo Select2::widget([
                //     'model' => $model,
                //     'attribute' => 'district_id',
                //     'data' => $data,
                //     'options' => ['placeholder' => 'กรุณาเลือกเขต พกส.'],
                //     'pluginOptions' => [
                //         'allowClear' => true
                //     ],
                // ]);
            ?>
        </div>
    </div>

    <?php // $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหาข้อมูล', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('รีเซ็ต', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>