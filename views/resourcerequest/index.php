<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Resourcerequest;
use app\models\Resourcestatus;
use app\models\User;

$this->title = 'Recursos Solicitados';
?>
<div class="resourcerequest-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',
        'columns' => [
            [
              'attribute' => 'id',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 4%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ], 
            [
              'attribute' => 'created',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
              'format' => ['date', 'php:d/m/Y'],
            ],   
            [
              'attribute' => 'user_id',
              'format' => 'raw',
              'enableSorting' => true,
              'value' => function ($model) {                      
                  return $model->user ? $model->user->username : '<span class="text-danger"><em>Nenhum</em></span>';
              },
              'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
              'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],   
            [
              'attribute' => 'location_id',
              'enableSorting' => true,
              'value' => function ($model) {                      
                      return $model->location->shortname;
                      },
              'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
              'contentOptions'=>['style'=>'width: 3%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],                                   
            [
              'attribute' => 'client_name',
              'contentOptions'=>['style'=>'width: 15%;text-align:left;text-transform: uppercase'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
              'attribute' => 'value_request',
              'enableSorting' => true,
              'format'=>['decimal',2],
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],     
            [
              'attribute' => 'requested_month',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getRequestedMonthValue(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Resourcerequest::$Static_requested_month,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],     
            [
              'attribute' => 'requested_year',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getRequestedYearValue(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Resourcerequest::$Static_requested_year,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],    
            [
              'attribute' => 'resource_purposes',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getResourcePurposes(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Resourcerequest::$Static_resource_purposes,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],            
            [
              'attribute' => 'resource_type',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getResourceType(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Resourcerequest::$Static_resource_type,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],                                     
            // 'expiration_register',
            // 'lastupdate_register',
            // 'value_capital',
            // 'observation:ntext',
            // 'has_transfer',
            // 'receive_credit',
            // 'add_insurance',
            // 'requested_month',
            // 'requested_year',
            // 'location_id',
            // 'user_id',
            // 'resource_type_id',
            [
              'attribute' => 'resource_status_id',
              'enableSorting' => true,
              'format' => 'raw',          
              // 'value' => function ($model) {                      
              //         return '<span style="color:'.$model->resourceStatus->hexcolor.'">'.$model->resourceStatus->name.'</span>';
              //         },
              'value'=>function($model) {
                  if(isset($model->manager)) {
                      return Html::tag('div', '<span style="color:'.$model->resourceStatus->hexcolor.'">'.$model->resourceStatus->name.'</span>', ['data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Alterado por '.$model->manager->username]);
                  } else {
                      return Html::tag('div', '<span style="color:'.$model->resourceStatus->hexcolor.'">'.$model->resourceStatus->name.'</span>', ['data-toggle'=>'tooltip','data-placement'=>'bottom','title'=>'Aguardando atendimento']);
                  }
              },                      
              'filter' => ArrayHelper::map(Resourcestatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Ações',  
              'contentOptions'=>['style'=>'width: 15%;text-align:right'],
              'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],                            
              'template' => '{view} {update} {delete} {manager}',
              'buttons' => [
                  'view' => function ($url, $model) {
                      return $model->user_id === Yii::$app->user->identity->id ? Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', $url, [
                                  'title' => 'Detalhes',
                                  'class' => 'btn btn-default btn-xs',
                      ]): Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', "#", [
                                  'title' => 'Registro pertence a outro usuário!',
                                  'class' => 'btn btn-default btn-xs',
                                  'disabled' => true,
                      ]);
                  },                                 
                  'update' => function ($url, $model) {
                      return $model->user_id === Yii::$app->user->identity->id ? Html::a('<span class="glyphicon glyphicon-pencil" ></span>', $url, [
                                  'title' => 'Alterar',
                                  'class' => 'btn btn-default btn-xs',
                      ]): Html::a('<span class="glyphicon glyphicon-pencil" ></span>', "#", [
                                  'title' => 'Registro pertence a outro usuário!',
                                  'class' => 'btn btn-default btn-xs',
                                  'disabled' => true,
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
                  'manager' => function ($url, $model) {
                      return Yii::$app->user->can("productmanager") === true ? Html::a('<span class="glyphicon glyphicon-cog" ></span>', $url, [
                                  'title' => 'Alterar Situação',
                                  'class' => 'btn btn-default btn-xs',
                      ]): Html::a('<span class="glyphicon glyphicon-cog" ></span>', "#", [
                                  'title' => 'Acesso não permitido!',
                                  'class' => 'btn btn-default btn-xs',
                                  'disabled' => true,
                      ]);
                  },                                   
                ],
            ],
        ],
    ]); ?>

</div>
