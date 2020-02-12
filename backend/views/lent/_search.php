<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'lent_date')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>[
                    'class' => 'form-control'
                ]
            ]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'employee_id') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'edc_id') ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'status')->dropDownList(['1'=>'คืนเครื่องแล้ว','2'=>'ยังไม่คืนเครื่อง'],['prompt' => 'กรุณาเลือกสถานะ'])?>
        </div>
    </div>
    

    

    

    

    <?php // echo $form->field($model, 'return_date') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('ค้นหาข้อมูล', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('รีเซ็ต', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
