<?php

use yii\bootstrap\Nav;

    echo Nav::widget([
        'activateItems' => true,
        'encodeLabels' => false,
        'items' => [
            [
                'label'   => '<i class="fa fa-calculator" aria-hidden="true"></i> Cálculo de Empréstimo',
                'url'     => ['simulator'],
            ],
            // [
            //     'label'   => '<i class="fa fa-line-chart" aria-hidden="true"></i> Estatísticas',
            //     'url'     => ['dashboard'],
            // ],  
            [
                'label'   => '<i class="fa fa-database" aria-hidden="true"></i> Base de Associados',
                'url'     => ['index'],
            ],  
            // [
            //     'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
            //     'url'     => ['create'],
            //     'visible' => Yii::$app->user->identity->role_id == 5,
            // ],                                                                                         
        ],
    'options' => ['class' =>'nav-pills'],
    ]);
?>