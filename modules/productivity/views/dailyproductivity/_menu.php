<?php

use yii\bootstrap\Nav;
    echo Nav::widget([
        'activateItems' => true,
        'encodeLabels' => false,
        'items' => [
            [
                'label'   => '<i class="fa fa-line-chart" aria-hidden="true"></i> Painel de Desempenho',
                'url'     => ['/productivity/dailyproductivity/performance_overview'],
            ],
            [
                'label'   => '<i class="fa fa-list-alt" aria-hidden="true"></i> Listar',
                'url'     => ['/productivity/dailyproductivity/index'],
            ],
            [
                'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                'url'     => ['/productivity/dailyproductivity/create'],
            ], 
            [
                'label'   => '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Gerenciar',
                'url'     => ['/productivity/managerdailyproductivity/index'],
                'visible' => Yii::$app->user->identity->role_id == 2,
            ], 
        ],
    'options' => ['class' =>'nav-pills'],
    ]);
?>