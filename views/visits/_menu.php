	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [ 
                    [
                        'label' => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Relatórios',
                        'items' => [
                            [
                                'label' => 'Geral',
                                'url' => ['/visits/report_general'],
                            ],                        
                            [
                                'label' => 'Por Usuário', 
                                'url' => ['/visits/report_user'],
                            ],
                            [
                                'label' => 'Por Agência',
                                'url' => ['/visits/report_location'],
                            ],                          
                        ],
                    ],   
                    [
                        'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                        'url'     => ['/visits/create'],
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                        'url'     => ['/visits/index'],
                    ],                                                                               
                ],
            'options' => ['class' =>'nav-pills'],
            ]);
	?>