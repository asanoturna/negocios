	<?php
    use yii\bootstrap\Nav;
            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [ 
                    [
                        'label'   => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Desempenho',
                        'url'     => ['/visits/report_user'],
                    ],                      
                    [
                        'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                        'url'     => ['/visits/create'],
                        'visible' => Yii::$app->user->can("business_visits"),
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                        'url'     => ['/visits/index'],
                    ],                                                                               
                ],
            'options' => ['class' =>'nav-pills'],
            ]);
	?>