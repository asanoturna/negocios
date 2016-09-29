	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [ 
                    // [
                    //     'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                    //     'url'     => ['create'],
                    // ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Regulamento',
                        'url'     => ['regulation'],
                    ],                 
                    [
                        'label'   => '<span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Ranking',
                        'url'     => ['ranking'],
                    ],                  
                    [
                        'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                        'url'     => ['index'],
                    ],                                                                               
                ],
            'options' => ['class' =>'nav-pills'],
            ]);
	?>