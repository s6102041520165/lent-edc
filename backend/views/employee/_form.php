<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\District;
use app\models\Division;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(); ?>
<div class="employee-form">
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'lastname')->textInput() ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'line')->textInput(['maxlength' => true]) ?>
        </div>
        
        <div class="col-lg-3">
            <label class="control-label">
                เขต พกส.
            </label>
            <?php
            $data = ArrayHelper::map(District::find()->asArray()->all(),'id', 'name'); 
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

        <div class="col-lg-3">
            <label class="control-label">
                กอง
            </label>
            <?php
            $dataDivision = ArrayHelper::map(Division::find()->asArray()->all(),'id', 'name'); 
            echo Select2::widget([
                'model' => $model,
                'attribute' => 'division_id',
                'data' => $dataDivision,
                'options' => ['placeholder' => 'กอง'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>
</div>








<?php // $form->field($model, 'created_at')->textInput() ?>

<?php // $form->field($model, 'created_by')->textInput() ?>

<?php // $form->field($model, 'updated_at')->textInput() ?>

<?php // $form->field($model, 'updated_by')->textInput() ?>



<?php ActiveForm::end(); ?>

</div>