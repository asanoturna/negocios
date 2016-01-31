	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [ 
                    [
                        'label' => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Desempenho',
                        'items' => [
                            [
                                'label' => 'Ranking por Usuário', 
                                'url' => ['/dailyproductivity/performance_user'],
                            ],
                             //'<li class="divider"></li>',
                             //'<li class="dropdown-header">Dropdown Header</li>',
                            [
                                'label' => 'Ranking por Agência',
                                'url' => ['/dailyproductivity/performance_location'],
                            ],
                            [
                                'label' => 'Visão Geral dos Produtos',
                                'url' => ['/dailyproductivity/performance_overview'],
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