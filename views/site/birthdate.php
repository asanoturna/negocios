<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Aniversariantes do Mês';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>
  
    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
                    id, 
                    avatar as avatar,
                    fullname,
                    status
                    FROM user
                    WHERE status = 1
                    ORDER BY fullname",
        'totalCount' => 300,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 300,
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
                            return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'fullname',
                        'format' => 'raw',
                        'header' => 'Nome / Usuário',
                        'value' => function ($data) {                      
                            return $data["fullname"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],                                                             
                ],
            ]); ?>    
    </div>
    </div>
</div>
