<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edc-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'import_date')->textInput() ?>

    <?php //$dataList = ArrayHelper::map(\backend\models\EdcSearch::find()->all(),'id','') ?>

    <?= $form->field($model, 'status')->dropDownList(['1'=>'ใช้งานได้','2'=>'ส่งซ่อม'],['prompt' => 'กรุณาเลือกสถานะ'])?>

    <?php // $form->field($model, 'created_at')->textInput() ?>

    <?php // $form->field($model, 'created_by')->textInput() ?>

    <?php // $form->field($model, 'updated_at')->textInput() ?>

    <?php // $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
