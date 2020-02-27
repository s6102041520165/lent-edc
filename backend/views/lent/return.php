<?php

use app\models\Edc;
use app\models\Lent;
use kartik\select2\Select2;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = 'คืนเครื่อง EDC';
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'คืนเครื่อง EDC';
?>
<div class="lent-return">
    <?php $form = ActiveForm::begin(); ?>
    <div class="panel">
        <div class="panel-body">
            <div class="row">

                <div class="col-lg-12">
                    <?php $data = ArrayHelper::map(Lent::find()->with('edc')->where(['lent.status'=>1])->asArray()->all(), 'edc.id', 'edc.serial_no') ?>
                    <?php //echo $form->field($model, 'edc_id')->textInput(['maxLenght' => true, 'autofocus' => true]) ?>
                    <?php echo $form->field($modelReturn, 'status')->hiddenInput(['value' => 2])->label(false) ?>
                    <?php echo $form->field($modelReturn, 'edc_id')->widget(Select2::className(), [
                        'data' => $data,
                        'language' => 'en',
                        'options' => ['placeholder' => 'กรุณาเลือกเขต พกส.'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])?>
                </div>

            </div>


            <div class="form-group">
                <?= Html::submitButton(FA::icon('undo') . ' คืนเครื่อง', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>