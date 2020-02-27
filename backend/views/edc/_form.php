<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\District;
use app\models\Division;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Edc */
/* @var $form yii\widgets\ActiveForm */
$date2=date("yy-m-d");

?>

<div class="edc-form">
    <div class="panel">
        <div class="panel-body">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($model, 'import_date')->widget(\yii\jui\DatePicker::classname(), [
                        'language' => 'th',
                        'dateFormat' => 'yyyy-MM-dd',
                        'clientOptions' => ['defaultDate' => date('yy-m-d')]  ,
                        'value' => $date2,
                        'options' => [
                            'class' => 'form-control'
                        ],
                    ]) ?>
                </div>
                <div class="col-lg-6">
                    <?= '<label class="control-label">เขต พกส.</label>'; ?>
                    <?php
                    $data = ArrayHelper::map(District::find()->where(['<>','status','0'])->asArray()->all(), 'id', 'name');
                    echo Select2::widget([
                        'model' => $model,
                        'attribute' => 'district_id',
                        'data' => $data,
                        'options' => ['placeholder' => 'กรุณาเลือกเขต พกส.'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-lg-6">
                    <?= '<label class="control-label">กอง</label>'; ?>
                    <?php
                    $data = ArrayHelper::map(Division::find()->where(['<>','status','0'])->asArray()->all(), 'id', 'name');
                    // $data = ArrayHelper::multisort($data, ['name'], [SORT_ASC]);
                    echo Select2::widget([
                        'model' => $model,
                        'attribute' => 'division_id',
                        'data' => $data,
                        'options' => ['placeholder' => 'กรุณาเลือกกอง'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-lg-6">

                    <?= $form->field($model, 'status')->dropDownList(['1' => 'ใช้งานได้', '2' => 'ส่งซ่อม']) ?>
                </div>
                <?php // $form->field($model, 'created_at')->textInput() 
                ?>

                <?php // $form->field($model, 'created_by')->textInput() 
                ?>

                <?php // $form->field($model, 'updated_at')->textInput() 
                ?>

                <?php // $form->field($model, 'updated_by')->textInput() 
                ?>
                <div class="col-lg-6">
                    <?= $form->field($model, 'serial_no')->textInput([
                        'maxlength' => true,
                        // 'value' => 'xxx'
                        ]) ?>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>


</div>