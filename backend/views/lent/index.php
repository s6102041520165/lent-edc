<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระบบเบิกจ่ายเครื่อง EDC';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lent-index">
    <div class="panel">
        <div class="panel-body">
            <p>
                <?=Html::a('ยืมเครื่อง EDC', ['create'], ['class' => 'btn btn-success'])?>
            </p>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    <div class="panel">
        <div class="panel-body">

            <?=GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'lent_date:date',
                    // ชื่อพนักงาน ยืมคืน
                    [
                        'label' => 'ชื่อจริง - นามสกุล',
                        'attribute' => 'firstname',
                        'value' => function ($data) {
                            return $data->employee['firstname']." ".$data->employee['lastname'];
                        }
                    ],
                    ['label' => 'เครื่อง EDC', 'attribute' => 'edc.serial_no'],
                    // status การยืม
                    [
                        'label' => 'สถานะการยืมคืน',
                        'value' => function ($data) {
                            if($data->status==1){
                                return 'กำลังยืม';
                            }else if($data->status==2){
                                return 'คืนแล้ว';
                            }
                        }
                    ],
                    // 'status',
                    //'return_date',
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);?>
        </div>
    </div>


</div>