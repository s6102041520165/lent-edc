<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\District */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <div class="panel-body">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            

            <div class="form-group">
                <?= Html::submitButton('เพิ่มข้อมูล', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
