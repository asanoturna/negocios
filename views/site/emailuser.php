<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Tabs;

$this->title = 'Lista de E-mails';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?= Html::encode($this->title) ?></h1>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body">

    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Por Colaborador',
                'url' => ['/site/emailuser'],
                'active' => true,
            ],
            [
                'label' => 'Por Grupo',
                'url' => ['/site/emailgroup'],
            ],
        ],
    ]);
    ?>
    <br/>
    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
                    fullname, 
                    email
                FROM user
                WHERE status = 1
                ORDER BY fullname",
        'key'  => 'fullname',
        'totalCount' => 300,
        'pagination' => [
            'pageSize' => 300,
        ],         
    ]);
    ?>   
    <?= GridView::widget([
      'dataProvider' => $dataProviderUsers,
      'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
      'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
      'summary'      =>  '',
      'showHeader'   => false,        
      'tableOptions' => ['class'=>'table table-hover'],
      'columns' => [                                    
            [
                'attribute' => 'fullname',
                'format' => 'raw',
                'label'=> '',
                'value' => function ($data) {                      
                    return $data["fullname"];
                },
                'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;text-transform: uppercase'],
            ],  
            'email:email',                                                                                
        ],
    ]); ?> 
    </div>
    </div>

    </div>
    </div>
</div>