<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

use kartik\select2\Select2;
use app\models\Employee;
use app\models\Edc;

/* @var $this yii\web\View */
/* @var $model backend\models\LentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>
    <div class="row">
    <div class="col-lg-6">
                    <?php // $form->field($model, 'edc_id',['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) ?>
                    <?php
                        $data = ArrayHelper::map(Edc::find()->all(),'id', 'serial_no'); 
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
