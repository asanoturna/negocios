<?php
use kartik\sidenav\SideNav;
use yii\bootstrap\Nav;

/*
    <div class="panel panel-primary">
      <div class="panel-heading"><b>Módulos</b></div>
      <div class="panel-body">
    echo Nav::widget([
    'activateItems' => true,
    'encodeLabels' => false,
    'items' => [
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Visitas dos Gerentes',
        'url'     => ['/visits/index'],
        //'options' => ['class' => 'disabled'],
        ],
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Produtividade Diária',
        'url'     => ['/dailyproductivity/index'],
        ],                      
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Ação Capital',
        'url'     => ['/capitalaction/index'],
        ],    
        [
        'label'   => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Controle Recursos',
        'url'     => ['/resourcerequest/index'],
        ],                        
        ['label' => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span> Relatórios',  'items' => [
                            ['label' => 'Planilha Base', 'url' => 'reportbase/index'],
                            ['label' => 'TCF', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ['label' => 'Olap', 'url' => '#', 'options' => ['class' => 'disabled']],
                            ],
                        ],                                                                    
            ],
    'options' => ['class' =>'nav-pills nav-stacked'],
    ]);
      </div>
    </div>    
    */
?>
    <?php
    echo \cyneek\yii2\menu\Menu::widget([
        //'heading' => 'Options',
        'options' => [
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => false,
            'encodeLabels' => false,
            'indItem' => '<span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span>',
            ],
        //'class'=>'active',
        ]);
    ?>