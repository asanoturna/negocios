<?php

use yii\bootstrap\Nav;

    echo Nav::widget([
        'activateItems' => true,
        'encodeLabels' => false,
        'items' => [  
            [
                'label'   => '<span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Calendário',
                'url'     => ['calendar'],
            ],  
            [
                'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Lista de Atividades',
                'url'     => ['index'],
            ],  
            [
                'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                'url'     => ['create'],
                'visible' => Yii::$app->user->identity->can_visits == 1,
            ],                                                                                         
        ],
    'options' => ['class' =>'nav-pills'],
    ]);
?>