<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = 'เพิ่มกอง';
$this->params['breadcrumbs'][] = ['label' => 'Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
