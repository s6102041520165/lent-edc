<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = 'การเบิกจ่ายเครื่อง EDC';
$this->params['breadcrumbs'][] = ['label' => 'Lents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lent-create">

    <div class="panel">
        <div class="panel-body">
            <?= $this->render('_form', [
                'model' => $model,
                'status' => 1
            ]) ?>
        </div>
    </div>
    
</div>
