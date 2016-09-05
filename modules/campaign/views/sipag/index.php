<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\campaign\models\Sipag;
use app\models\User;

$this->title = 'Multirão';
?>
<div class="opcredit-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
      <div class="panel-heading"><b>Pesquisar</b></div>
        <div class="panel-body" style="height: 140px;max-height: 140;">
          <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
      </div>
    </div> 
    <div class="col-md-6">
      <div class="panel panel-default">
      <div class="panel-heading"><b>Taxas</b></div>
        <div class="panel-body" style="height: 140px;max-height: 140;">
          --
        </div>
      </div>
    </div>     
    </div>

    <div class="panel panel-default">
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',  
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],      
        'columns' => [
            [
                'attribute' => 'id',
                'enableSorting' => true,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            // [
            //     'attribute' => 'establishmenttype',
            //     'enableSorting' => true,
            //     'value' => function($data) {
            //       return $data->getEstablishmenttype();
            //     },
            //     'filter' => Sipag::$Static_establishmenttype,
            //     'contentOptions'=>['style'=>'width: 8%;text-align:center'],
            // ],
            [
                'attribute' => 'establishmentname',
                'format' => 'raw',
                'value' => function ($model) {                      
                      return $model->establishmentname."<p class=\"text-muted\">".$model->expedient."</p>";
                },                
                'contentOptions'=>['style'=>'width: 15%;text-align:left'],
            ],
            [
                'attribute' => 'address',
                'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            ],  
            [
                'attribute' => 'visited',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getVisited();
                },
                'filter' => Sipag::$Static_visited,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
                'attribute' => 'accredited',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getAccredited();
                },
                'filter' => Sipag::$Static_accredited,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
                'attribute' => 'locked',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getLocked();
                },
                'filter' => Sipag::$Static_locked,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
                'attribute' => 'anticipation',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getAnticipation();
                },
                'filter' => Sipag::$Static_anticipation,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],  
            [
                'attribute' => 'status',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getStatus();
                },
                'filter' => Sipag::$Static_status,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],                      
            [
                'attribute' => 'user_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->user ? $model->user->username : null;
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            ],
            [
                'attribute' => 'checkedby',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->checkedby ? $model->user->username : null;
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 10%;text-align:left'],
            ],
            [
              'attribute' => 'date',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'format' => ['date', 'php:d/m/Y'],
            ],             
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Ações',  
              'contentOptions'=>['style'=>'width: 5%;text-align:right'],
              'headerOptions' => ['class' => 'text-center'],                            
              'template' => ' {update} {delete}',
              'buttons' => [
                  'view' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', $url, [
                                  'title' => 'Detalhes',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },                                                
                  'update' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-pencil" ></span>', "#", [
                                  'title' => 'Alterar',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },
                  'delete' => function ($url, $model) {
                      return $model->user_id === Yii::$app->user->identity->id ? Html::a('<span class="glyphicon glyphicon-trash" ></span>', $url, [
                                  'title' => 'Excluir',
                                  'class' => 'btn btn-default btn-xs',
                                  'data-confirm' => 'Tem certeza que deseja excluir?',
                                  'data-method' => 'post',
                                  'data-pjax' => '0',
                      ]): Html::a('<span class="glyphicon glyphicon-trash" ></span>', "#", [
                                  'title' => 'Registro pertence a outro usuário!',
                                  'class' => 'btn btn-default btn-xs',
                                  'disabled' => true,
                      ]);
                  },                                  
                ],
            ],
        ],
    ]); ?>
    </div>
    </div>
</div>