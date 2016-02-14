	<?php

    use yii\bootstrap\Nav;

            echo Nav::widget([
                'activateItems' => true,
                'encodeLabels' => false,
                'items' => [ 
                    // [
                    //     'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                    //     'url'     => ['/capitalaction/create'],
                    // ], 
                    [
                        'label'   => '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Inserir',
                        'url'     => ['/capitalaction/create'],
                    ],
                    [
                        'label'   => '<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Listar',
                        'url'     => ['/capitalaction/index'],
                    ],                                                                               
                ],
            'options' => ['class' =>'nav-pills'],
            ]);
	?>