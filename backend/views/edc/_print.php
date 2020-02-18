<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<?php
echo ListView::widget([
    'dataProvider' => $model,
    'itemView' => '_data',
    'viewParams' => [
        'fullView' => true,
        'context' => 'main-page',
    ],
]);
?>
<barcode code="12345678" type="c93" size="0.8" height="2.0" />