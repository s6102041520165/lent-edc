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
        'labels' => ["January", "February"],
        'datasets' => [
            [
                'label' => "My First dataset",
                'backgroundColor' => [
                    '#ADC3FF',
                    '#FF9A9A',
                ],
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59]
            ]
        ]
    ]
]);
?>