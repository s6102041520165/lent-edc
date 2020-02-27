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

                <div class="col-lg-12">
                    <?php
                    $data = ArrayHelper::map(Employee::find()->all(), 'id', function ($dumb) {
                        return $dumb->id . "--" . $dumb->firstname . " " . $dumb->lastname . "--" . $dumb->line;
                    });
                    echo '<label class="control-label">พนักงาน</label>';
                    echo Select2::widget([
                        'model' => $model,
                        'attribute' => 'employee_id',
                        'data' => $data,
                        'options' => ['placeholder' => 'กรุณาเลือกพนักงาน'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>

                <div class="col-lg-12">
                    <?= $form->field($model, 'status')->hiddenInput(['value' => $status])->label(false) ?>
                </div>
                <div class="col-lg-12">
                    <?php // $form->field($model, 'edc_id',['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'tabindex' => '1']]) 
                    ?>

                    <?php
                    $data = ArrayHelper::map(Edc::find()->where(['status' => '1'])->asArray()->all(), 'id', 'serial_no');
                    // $data = ArrayHelper::map(ContactGroups::find()->where(['group_status'=>'ACTIVE'])->asArray()->all(),'group_id', 'group_name');
                    echo $form->field($model, 'edc_id')->widget(Select2::className(), [
                        'data' => $data,
                        'language' => 'en',
                        'options' => ['placeholder' => 'เครื่อง EDC'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);

                    // echo Select2::widget([
                    //     'name' => 'edc_id',
                    //     'data' => $data,
                    //     'size' => Select2::SMALL,
                    //     'options' => ['placeholder' => 'Select a state ...'],
                    //     'pluginOptions' => [
                    //         'allowClear' => true
                    //     ],
                    // ])
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