<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\ArrayHelper;

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

    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#">Por Colaborador</a></li>
      <li role="presentation"><a href="#">Por Grupo</a></li>
    </ul>

    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
            fullname, 
            email
        FROM location
        WHERE is_active = 1
        ORDER BY fullname",
            'key'  => 'fullname',
    ]);
    ?>   
    <?= GridView::widget([
      'dataProvider' => $dataProviderUsers,
      'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
      'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
      'summary'      =>  '',
      'showHeader'   => true,        
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
            [
                'attribute' => 'email',
                'format' => 'raw',
                'label'=> '',
                'value' => function ($data) {                      
                    return $data["email"];
                },
                'contentOptions'=>['style'=>'width: 25%;text-align:left;vertical-align: middle;'],
            ],                                                                                 
        ],
    ]); ?> 
    </div>
    </div>

    </div>
    </div>
</div>