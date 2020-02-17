<?php

use dosamigos\chartjs\ChartJs;
?>
<?= ChartJs::widget([
    'type' => 'pie',
    'options' => [
        'height' => '200px',
        'width' => '500px'
    ],
    'data' => [
        'labels' => ["พนักงานยืมเครื่อง EDC", "เครื่อง EDC พร้อมใช้งาน"],
        'datasets' => [
            [
                'label' => "My First dataset",
                'backgroundColor' => [
                    'red',
                    '#99C08E',
                ],
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [$lent, $active]
            ]
        ]
    ]
]);
?>