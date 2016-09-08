<?php

use yii\bootstrap\Nav;

    echo Nav::widget([
        'activateItems' => true,
        'encodeLabels' => false,
        'items' => [ 
            // [
            //     'label' => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Desempenho',
            //     'items' => [

            //         [
            //             'label' => 'Resumo Diário',
            //             'url' => ['visits/dailysummary'],
            //         ],
            //         [
            //             'label' => 'Desempenho Por Usuário', 
            //             'url' => ['visits/report_user'],
            //         ],
            //         // [
            //         //     'label' => 'Desempenho Por Agência', 
            //         //     'url' => ['visits/ranking_user'],
            //         // ],
            //     ],
            // ],
            [
                'label'   => '<span class="glyphicon glyphicon-equalizer" aria-hidden="true"></span> Resumo Diário',
                'url'     => ['visits/dailysummary'],
            ],                 
            [
                'label'   => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Desempenho',
                'url'     => ['visits/report_user'],
            ],                      
            [
                'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                'url'     => ['visits/index'],
            ],  
            [
                'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                'url'     => ['visits/create'],
                'visible' => Yii::$app->user->identity->can_visits == 1,
            ],                                                                                         
        ],
    'options' => ['class' =>'nav-pills'],
    ]);
?>