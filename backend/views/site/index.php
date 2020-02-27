<?php

/* @var $this yii\web\View */

use PhpOffice\PhpSpreadsheet\Helper\Html;
use rmrevin\yii\fontawesome\FA;
use yii\helpers\Html as HelpersHtml;

$this->title = 'หน้าหลัก';
?>
<div class="site-index">

    <div class="panel">
        <div class="panel-body">
            <h3>คำอธิบายการใช้งานระบบ</h3>
            <p>
                <h4>โปรดศึกษาคู่มือการใช้งานก่อนใช้งานระบบ</h4> <br />
                <p>
                    <?= HelpersHtml::a(FA::icon('download') . ' ดาวน์โหลดคู่มือสำหรับเจ้าหน้าที่', [
                        'site/document'
                    ], [
                        'class' => 'btn btn-primary',
                        'target' => '_blank',
                    ]); ?>
                </p>
            </p>
        </div>
    </div>
</div>