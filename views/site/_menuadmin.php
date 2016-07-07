<?php
use kartik\sidenav\SideNav;
use yii\bootstrap\Nav;

?>
    <div class="panel panel-default">
      <div class="panel-heading"><b>Gerenciar</b></div>
      <div class="panel-body">
<?php      
    echo Nav::widget([
    'activateItems' => true,
    'encodeLabels' => false,
    'items' => [
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Usuários',
        'url'     => ['/useradmin/index'],
        'visible' => Yii::$app->user->identity->can_admin == 1,
        //'options' => ['class' => 'disabled'],
        ],
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Unidades',
        'url'     => ['/location/index'],
        'visible' => Yii::$app->user->identity->can_admin == 1,
        ],
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Departamentos',
        'url'     => ['/department/index'],
        'visible' => Yii::$app->user->identity->can_admin == 1,
        ],
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Menu',
        'url'     => ['/menuadmin/index'],
        'visible' => Yii::$app->user->identity->can_admin == 1,
        ],   
        // [
        // 'label' => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Módulos',  
        // 'items' => [
        //         ['label' => 'Visitas', 'url' => '#'],
        //         ['label' => 'Produtividade', 'url' => '#', 'options' => ['class' => 'disabled']],
        //         ['label' => 'Arquivos', 'url' => '#', 'options' => ['class' => 'disabled']],
        //     ],
        // 'options' => ['class' => 'disabled'],
        // ],                                                                                   
    ],
    'options' => ['class' =>'nav-pills nav-stacked'],
    ]);
    ?>
      </div>
    </div>    
    

