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
    ]); ?>

    <div class="row">

        <div class="col-lg-6">
            <?= $form->field($model, 'serial_no') ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'import_date') ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'status') ?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'created_at') ?>
        </div>

        <?php // echo $form->field($model, 'created_by') 
        ?>

        <?php // echo $form->field($model, 'updated_at') 
        ?>

        <?php // echo $form->field($model, 'updated_by') 
        ?>
        <div class="col-lg-12">
            <div class="form-group">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>