<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Agências';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php
    echo \cyneek\yii2\menu\Menu::widget([
        //'heading' => 'Options',
        'options' => [
            'type' => SideNav::TYPE_DEFAULT,
            'heading' => false,
            'encodeLabels' => true,
            ],
        //'class'=>'head-style',
        ]);
    ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Mapa', 'map', ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
        			id,
					fullname, 
					address,
					email,
					phone
				FROM location
				ORDER BY fullname",
        //'totalCount' => 100,
        //'sort' =>true,
        'key'  => 'id',
    ]);
    ?>    
    <?= GridView::widget([
              'dataProvider' => $dataProviderUsers,
              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
              'summary'      =>  '',
              'showHeader'   => false,        
              'tableOptions' => ['class'=>'table '],
              'columns' => [                                    
                    [
                        'attribute' => 'fullname',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["fullname"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'email',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["email"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],                                                           
                ],
            ]); ?>    
    </div>
    </div>
</div>
