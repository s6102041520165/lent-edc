<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */

$this->title = 'แก้ไขข้อมูลเครื่อง Edc: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Edcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="edc-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
