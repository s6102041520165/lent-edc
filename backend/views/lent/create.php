<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lent */

$this->title = 'Create Lent';
$this->params['breadcrumbs'][] = ['label' => 'Lents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lent-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
