<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Colaboradores';
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
    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
                    id, 
                    avatar as avatar,
                    username, 
                    email,
                    fullname,
                    status
                    FROM user
                    WHERE status = 10
                    ORDER BY username",
        'totalCount' => 100,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 100,
        ],
    ]);
    ?>  
    <?= GridView::widget([
              'dataProvider' => $dataProviderUsers,
              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
              'summary'      =>  '',
              'showHeader'   => false,        
              'tableOptions' => ['class'=>'table'],
              'columns' => [     
                    [
                        'attribute' => 'avatar',
                        'header' => '',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return Html::img('@web/images/users/'.$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'fullname',
                        'format' => 'raw',
                        'header' => 'Nome / Usuário',
                        'value' => function ($data) {                      
                            return $data["fullname"]."</br>".$data["username"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'email',
                        'format' => 'raw',
                        'header' => 'Contato',
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
