	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [
                    [
                        'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                        'url'     => ['/dailyproductivity/create'],
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                        'url'     => ['/dailyproductivity/index'],
                    ],    
                    [
                        'label'   => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Desempenho',
                        'url'     => ['/dailyproductivity/performance'],
                    ],                                          
                    [
                        'label'   => '<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Gerenciar',
                        'url'     => ['/managerdailyproductivity/index'],
                    ],                                                
                ],
            'options' => ['class' =>'nav-pills'],
            ]);
	?>