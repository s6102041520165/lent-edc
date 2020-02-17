<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\District;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Edc */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="edc-form">
<div class="panel">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        
        <?= $form->field($model, 'import_date')->widget(\yii\jui\DatePicker::classname(), [
            'language' => 'th',
            'dateFormat' => 'yyyy-MM-dd',
            'options'=>[
                'class' => 'form-control'
            ]
        ]) ?>
        <?php //  $form->field($model, 'import_date')->textInput() ?>

        <?= $form->field($model, 'serial_no')->textInput(['maxlength' => true]) ?>


        <?php
            $data = ArrayHelper::map(District::find()->asArray()->all(),'id', 'name'); 
            // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
             echo $form->field($model, 'district_id')->widget(Select2::classname(), [
                'data' => $data,
                'language' => 'de',
                'options' => ['placeholder' => 'Select a state ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
        ?>     

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
</div>
    

</div>
