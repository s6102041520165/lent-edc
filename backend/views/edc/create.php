<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Edc */

$this->title = 'เพิ่มข้อมูลเครื่อง EDC';
$this->params['breadcrumbs'][] = ['label' => 'Edcs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edc-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
