<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Usuários';
?>
<div class="useradmin-index">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('//site/_menuadmin'); ?>
    </div>

    <div class="col-sm-10">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar', ['create'], ['class' => 'btn btn-success']) ?>
      </span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
      <div class="panel-body">    

    <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover'],
        'columns' => [
            [
            'attribute' => 'id',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            ],
            // [
            // 'attribute' => 'avatar',
            // 'format' => 'html',
            // 'value' => function ($model) {
            //     return Html::img(Yii::$app->params['usersAvatars'].Yii::$app->user->identity->avatar,
            //         ['width' => '50px', 'class' => 'img-rounded img-responsive']);
            // },
            // 'contentOptions'=>['style'=>'width: 6%;text-align:middle'],                    
            // ],
            [
            'attribute' => 'username',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 15%;text-align:left'],
            ],             
            [
            'attribute' => 'fullname',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 25%;text-align:left'],
            ],       
            'email:email',           
            [ 
            'attribute' => 'status',
            'enableSorting' => true,
            'format' => 'raw',
            'value' => function ($model) {                      
                    return $model->status == 1 ? '<b style="color:green">Sim</b>' : '<b style="color:gray">Não</b>';
                    },
            'filter'=>[0=>'Não', 1=>'Sim'],
            'contentOptions'=>['style'=>'width: 6%;text-align:center'],
            ], 
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Ações',  
              'contentOptions'=>['style'=>'width: 10%;text-align:right'],
              'headerOptions' => ['class' => 'text-center'],                            
              'template' => '{avatar} {view} {update} {delete}',
              'buttons' => [
                  'avatar' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-camera" ></span>', $url, [
                                  'title' => 'Alterar Foto',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },                                
                  'view' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', $url, [
                                  'title' => 'Detalhes',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },                                                
                  'update' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-pencil" ></span>', $url, [
                                  'title' => 'Alterar',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },
                  'delete' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-trash" ></span>', $url, [
                                  'title' => 'Excluir',
                                  'class' => 'btn btn-default btn-xs',
                                  'data-confirm' => 'Tem certeza que deseja excluir?',
                                  'data-method' => 'post',
                                  'data-pjax' => '0',
                      ]);
                  },                                    
                ],
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
    </div>
    </div>

    </div>
  </div>
</div>