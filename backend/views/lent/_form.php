<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use app\models\Employee;
use app\models\Edc;
use rmrevin\yii\fontawesome\FA;

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
                        'options' => [
                            'class' => 'form-control'
                        ]
                    ]) ?>
                </div>
                

                <div class="col-lg-6">
                    <?= $form->field($model, 'status')->dropDownList($status) ?>
                </div>
                <div class="col-lg-6">                    
                    <?php
                    $data = ArrayHelper::map(Edc::find()->asArray()->all(), 'id', 'serial_no');
                    // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                    echo $form->field($model, 'edc_id')->widget(Select2::className(), [
                        'data' => $data,
                        'language' => 'th',
                        'options' => ['placeholder' => 'กรุณาเลือกเขต พกส.'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-lg-6">                    
                    <?php
                    $rfid = ArrayHelper::map(Employee::find()->asArray()->all(), 'id', 'rfid');
                    // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                    echo $form->field($model, 'employee_id')->widget(Select2::className(), [
                        'data' => $rfid,
                        'language' => 'th',
                        'options' => ['placeholder' => 'RFID'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(FA::icon('save') . ' บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>