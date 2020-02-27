<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = Yii::$app->formatter->format($model->updated_at, 'datetime');
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->created_at]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="lent-update">


    <?= $this->render('_form', [
        'model' => $model,
        'status' => 2
    ]) ?>

</div>
