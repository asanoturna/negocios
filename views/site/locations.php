<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\ListView;
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
				WHERE is_active = 1
				ORDER BY fullname",
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
                    return $data["fullname"]."</br>Endereço: abcabcabc";
                },
                'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
            ],  
            [
                'attribute' => 'email',
                'format' => 'raw',
                'header' => '',
                'value' => function ($data) {                      
                    return '<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> '.$data["email"]."</br>".'<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>';
                },
                'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
            ],                                                           
        ],
    ]); ?>    
    </div>
    </div>
</div>
