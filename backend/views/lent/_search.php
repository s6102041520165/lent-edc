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

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'lent_date') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'edc_id') ?>

    <?= $form->field($model, 'status') ?>

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
