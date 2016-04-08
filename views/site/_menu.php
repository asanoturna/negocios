<?php
use yii\bootstrap\Nav;
    echo Nav::widget([
    'activateItems' => true,
    'encodeLabels' => false,
    'items' => [
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Visitas dos Gerentes',
        'url'     => ['/visits/index'],
        //'options' => ['class' => 'disabled'],
        ],
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Produtividade Diária',
        'url'     => ['/dailyproductivity/performance_overview'],
        ],                      
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Ação Capital',
        'url'     => ['/capitalaction/index'],
        ],    
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Controle Recursos',
        //'url'     => ['/dailyproductivity/create'],
        'options' => ['class' => 'disabled'],
        ],                     
        // [
        // 'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Relatórios Olap/TCF',
        // 'options' => ['class' => 'disabled'],
        // //'url'     => ['/dailyproductivity/create'],
        // ],    
        ['label' => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Relatórios',  'items' => [
                            ['label' => 'Planilha Base', 'url' => 'index.php?r=reportbase'],
                            ['label' => 'TCF', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ['label' => 'Olap', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ],
                        ],                                                                    
            ],
    'options' => ['class' =>'nav-pills nav-stacked'],
    // set this to nav-tab to get tab-styled navigation
    ]);
?>