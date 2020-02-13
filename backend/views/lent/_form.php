<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lent-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <div class="panel-body">
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
                    <?= $form->field($model, 'status')->dropDownList(['2'=>'คืนเครื่องแล้ว','1'=>'ยังไม่คืนเครื่อง'],['prompt' => 'กรุณาเลือกสถานะ'])?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
