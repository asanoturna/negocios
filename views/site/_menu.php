	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [
                    [
                        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Visitas dos Gerentes',
                        //'url'     => ['/dailyproductivity/create'],
                        'options' => ['class' => 'disabled'],
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Produtividade Diária',
                        'url'     => ['/dailyproductivity/create'],

                    ],                      
                    [
                        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Adequação de Limites',
                        //'url'     => ['/dailyproductivity/create'],
                        'options' => ['class' => 'disabled'],
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Ação Capital', //grafico pizza
                        //'url'     => ['/dailyproductivity/create'],
                        'options' => ['class' => 'disabled'],
                    ],                                              
                ],
                'options' => ['class' =>'nav-pills nav-stacked'], // set this to nav-tab to get tab-styled navigation
            ]);
	?>