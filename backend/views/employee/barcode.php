<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<div class="employee-barcode">
    <div class="row">
    <?php
    foreach ($model as $model) {
        echo '<div style="text-align:center; font-family:thsarabun; width:33.33%; float:left; margin-bottom:20px">';
        echo '<barcode code="' . $model->id . '" type="c93" /><br/>';
        echo str_pad($model->id, 11, '0', STR_PAD_LEFT);
        echo "<br/>" . $model->firstname . " " . $model->lastname;
        echo '</div>';
    }
    ?>
    </div>


</div>