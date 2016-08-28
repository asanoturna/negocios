<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;


$this->title = 'Links Uteis';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><span class="glyphicon glyphicon-link" aria-hidden="true"></span> <?= Html::encode($this->title) ?></h1>
    <hr/>
    
     <div class="panel panel-default">
    <div class="panel-body">

    <?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Links da Intranet',
                'url' => ['/site/emailuser'],
                'active' => true,
            ],
            [
                'label' => 'Meus Links Pessoais',
                'url' => ['/site/emailgroup'],
            ],
        ],
    ]);
    ?>
    <br/>
    <?php
    $dataProviderUsers = new SqlDataProvider([
        'sql' => "SELECT
                    name, 
                    url
                FROM links
                WHERE status = 1
                ORDER BY name",
        'key'  => 'name',
        'totalCount' => 100,
        'pagination' => [
            'pageSize' => 100,
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
                'attribute' => 'name',
                'format' => 'raw',
                'label'=> '',
                'value' => function ($data) {                      
                    return $data["name"];
                },
                'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;text-transform: uppercase'],
            ],  
            'url:url',                                                                                
        ],
    ]); ?> 
    </div>
    </div>

    </div>
    </div>
</div>
