<?php

use yii\bootstrap\Nav;
    echo Nav::widget([
        'activateItems' => true,
        'encodeLabels' => false,
        'items' => [  
            [
                'label'   => '<span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Categorias',
                'url'     => ['/archive/category/list'],
            ],  
            [
                'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Lista de Arquivos',
                'url'     => ['/archive/file/index'],
            ],  
            [
                'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                'url'     => ['/archive/file/create'],
                //'visible' => Yii::$app->user->identity->role_id == 2,
            ], 
            [
                'label'   => '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Gerenciar',
                'url'     => ['/archive/category/manager'],
                'visible' => Yii::$app->user->identity->role_id == 99,
            ],                                                                                        
        ],
    'options' => ['class' =>'nav-pills'],
    ]);
?>