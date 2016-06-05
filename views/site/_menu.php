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
        'url'     => ['/dailyproductivity/index'],
        ],                      
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Ação Capital',
        'url'     => ['/capitalaction/index'],
        ],    
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Controle Recursos',
        'url'     => ['/resourcerequest/index'],
        ],                        
        ['label' => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Relatórios',  'items' => [
                            ['label' => 'Planilha Base', 'url' => 'reportbase/index'],
                            ['label' => 'TCF', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ['label' => 'Olap', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ],
                        ],                                                                    
            ],
    'options' => ['class' =>'nav-pills nav-stacked'],
    ]);
?>