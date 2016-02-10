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
                                'label' => 'Por Usuário', 
                                'url' => ['/visits/report_user'],
                            ],

                            [
                                'label' => 'Por Agência',
                                'url' => ['/visits/report_location'],
                            ],
                            // [
                            //     'label' => 'Por Finalidade',
                            //     'url' => ['/visits/report_overview'],
                            // ],                            
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