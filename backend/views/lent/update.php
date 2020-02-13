<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = Yii::$app->formatter->format($model->lent_date, 'date');
$this->params['breadcrumbs'][] = ['label' => 'ระบบเบิกจ่ายเครื่อง EDC', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->lent_date]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lent-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
