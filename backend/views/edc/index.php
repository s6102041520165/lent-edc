<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EdcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edcs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edc-index">
    <div class="panel">
        <div class="panel-body">
            <p>
                <?= Html::a('เพิ่มข้อมูลเครื่อง EDC', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]);
            ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'import_date:date',
                    'serial_no',
                    // 'status',
                    
                    'created_at:relativeTime',

                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>
</div>
</div>


</div>