<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\User;


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
                    'u.id', 
                    p.avatar as avatar,
                    u.username, 
                    u.email,
                    p.full_name,
                    u.status,
                    r.name
                    FROM user u
                    Inner JOIN profile p
                    ON u.id = p.user_id
                    INNER JOIN role r
                    ON u.role_id = r.id
                    ORDER BY u.username",
        'totalCount' => 100,
        //'sort' =>true,
        'key'  => 'u.id',
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
              'tableOptions' => ['class'=>'table table-striped table-hover '],
              'columns' => [     
                    [
                        'attribute' => 'avatar',
                        'header' => '',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(Yii::$app->request->BaseUrl.'/images/users/'.$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'full_name',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["full_name"]."</br>".$data["username"];
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
