<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เปลี่ยนรหัสผ่าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">

    <p>กรุณาป้อนอีเมล:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton(FA::icon('save').' บันทึก', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
