<?php

use yii\helpers\Html;
use yii\widgets\ListView;

?>
<div class="employee-barcode">
    <?php
    foreach ($model as $model) {
        echo '<p style="text-align:center; font-family:thsarabun">';
        echo '<barcode code="' . $model->id . '" type="c93" /><br/>';
        echo str_pad($model->id, 11, '0', STR_PAD_LEFT);
        echo "<br/>" . $model->firstname . " " . $model->lastname;
        echo '</p>';
        echo '<hr/>';
    }
    ?>


</div>