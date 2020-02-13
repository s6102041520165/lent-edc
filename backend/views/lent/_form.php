<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
use app\models\Employee;
use app\models\Edc;
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
                    <?php // $form->field($model, 'edc_id',['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>
                    <?php
                        $data = ArrayHelper::map(Edc::find()->where(['status'=>'1'])->all(),'id', 'serial_no'); 
                        // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                        echo '<label class="control-label">เครื่อง EDC</label>';
                        echo Select2::widget([
                            'name' => 'state_10',
                            'data' => $data,
                            'options' => ['placeholder' => 'กรุณากรอกเครื่อง Edc','tabindex' => ''],
                            'pluginOptions' => [
                                'allowClear' => true
                            ]
                        ]);
                    ?>
                </div>
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
                    <?php // $form->field($model, 'employee_id') ?>
                    <?php
                        $data = ArrayHelper::map(Employee::find()->all(),'id', 'firstname'); 
                        // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                        echo '<label class="control-label">พนักงาน</label>';
                        echo Select2::widget([
                            'name' => 'state_10',
                            'data' => $data,
                            'options' => ['placeholder' => 'กรุณาเลือกผู้เบิกจ่าย'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>
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
