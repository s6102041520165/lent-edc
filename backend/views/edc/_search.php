<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EdcSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edc-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <div class="row">

        <div class="col-lg-6">
            <?= $form->field($model, 'serial_no') ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'import_date')->widget(\yii\jui\DatePicker::classname(), [
                'language' => 'th',
                'dateFormat' => 'yyyy-MM-dd',
                'options'=>[
                    'class' => 'form-control',
                    'data-pjax' => 1
                ]
            ]) ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'status')->dropDownList(['1'=>'ใช้งานได้','2'=>'ส่งซ่อม'],['prompt' => 'กรุณาเลือกสถานะ'])?>
        </div>

        <div class="col-lg-6">
            <?php // $form->field($model, 'created_at') ?>
        </div>

        <?php // echo $form->field($model, 'created_by') 
        ?>

        <?php // echo $form->field($model, 'updated_at') 
        ?>

        <?php // echo $form->field($model, 'updated_by') 
        ?>
        <div class="col-lg-12">
            <div class="form-group">
                <?= Html::submitButton('ค้นหาข้อมูล', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('รีเซ็ต', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>