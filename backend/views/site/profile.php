<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เพิ่มผู้ใช้';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton(FA::icon('user-plus') . ' เพิ่มผู้ใช้', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>