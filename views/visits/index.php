<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Person;
use app\models\Visitsfinality;
use app\models\Visitsstatus;
use app\models\Visitsimages;
use app\models\User;

$this->title = 'Visitas dos Gerentes';
?>
<div class="visits-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="row">
    <div class="col-md-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><b>Pesquisar</b></div>
        <div class="panel-body">
          <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
      </div>
    </div>      
    <div class="col-md-6">
      <div class="panel panel-primary">
      <div class="panel-heading"><b>Opções</b></div>
        <div class="panel-body">
          <?php
          use kartik\export\ExportMenu;
              $gridColumns = [
                  ['attribute'=>'id', 'hAlign'=>'right', 'width'=>'100px'],  
                  ['attribute'=>'date','format'=>['date'], 'hAlign'=>'right', 'width'=>'110px'],  
                  [
                      'attribute'=>'user_id',
                      'label'=> 'Usuário',
                      'vAlign'=>'middle',
                      'width'=>'100px',
                      'value'=>function ($model, $key, $index, $widget) { 
                          return Html::a($model->user->username, '#', []);
                      },
                      'format'=>'raw'
                  ],                   
                  [
                      'attribute'=>'location_id',
                      'label'=> 'PA',
                      'vAlign'=>'middle',
                      'width'=>'100px',
                      'value'=>function ($model, $key, $index, $widget) { 
                          return Html::a($model->location->shortname, '#', []);
                      },
                      'format'=>'raw'
                  ], 
                  ['attribute'=>'company_person', 'hAlign'=>'right', 'width'=>'140px'], 
                  [
                      'attribute'=>'visits_finality_id',
                      'label'=> 'Finalidade',
                      'vAlign'=>'middle',
                      'width'=>'180px',
                      'value'=>function ($model, $key, $index, $widget) { 
                          return Html::a($model->visitsFinality->name, '#', []);
                      },
                      'format'=>'raw'
                  ],                    
                  [
                      'attribute'=>'visits_status_id',
                      'label'=> 'Situação',
                      'vAlign'=>'middle',
                      'width'=>'120px',
                      'value'=>function ($model, $key, $index, $widget) { 
                          return Html::a($model->visitsStatus->name, '#', []);
                      },
                      'format'=>'raw'
                  ],                   
              ];
              echo ExportMenu::widget([
              'dataProvider' => $dataProvider,
              'columns' => $gridColumns,
              'fontAwesome' => true,
              'emptyText' => 'Nenhum registro',
              'showColumnSelector' => true,
              'asDropdown' => true,
              'target' => ExportMenu::TARGET_BLANK,
              'showConfirmAlert' => false,
              'exportConfig' => [
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false
            ],
            'columnSelectorOptions' => [
              'class' => 'btn btn-success',
            ],
            'dropdownOptions' => [
              'icon' => false,
              'label' => 'Exportar Registros',
              'class' => 'btn btn-success',
            ],
            'filename' => 'relatorio-visitas',
            ]);
          ?>
        </div>
      </div>
    </div>
    </div>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',          
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'date',
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
                         return Html::a($model->user->username, ['/visits/report_user', 'user_id' => $model->user_id]);
                     },            
            'filter' => ArrayHelper::map(User::find()->where(['role_id' => 4, 'status' => 1])->orderBy('username')->asArray()->all(), 'id', 'username'),
            'filterInputOptions' => ['class' => 'form-control', 'style'=>'text-transform: lowercase'],
            'contentOptions'=>['style'=>'width: 8%;text-align:left;text-transform: lowercase'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'location_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->location->shortname;
                    },  
            'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
            'contentOptions'=>['style'=>'width: 3%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'company_person',
            'contentOptions'=>['style'=>'width: 18%;text-align:left;text-transform: uppercase'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'person_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->person->name;
                    },  
            'filter' => ArrayHelper::map(Person::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 3%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'visits_finality_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->visitsFinality->name;
                    },
            'filter' => ArrayHelper::map(VisitsFinality::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'attribute' => 'visits_status_id',
            'format' => 'raw',
            'enableSorting' => true,
            
            'value' => function ($model) {                      
                  return '<span style="color:'.$model->visitsStatus->hexcolor.'">'.$model->visitsStatus->name.'</span>';
                  },
            'filter' => ArrayHelper::map(VisitsStatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Ações',
            'contentOptions'=>['style'=>'width: 10%;text-align:right'],
            'headerOptions' => ['class' => 'text-center', 'style' => 'background-color: #cde1a4;'],
            'template' => '{has_map} {has_attach} {has_img} {view} {update} {delete}',
                'buttons' => [
                    'has_attach' => function ($url, $model) {
                        return $model->attachment <> null ? Html::a('<span class="glyphicon glyphicon-paperclip" ></span>', ['view', 'id' => $model->id], [
                                    'title' => 'Possui anexo',
                                    'class' => 'btn btn-default btn-xs',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Não possui anexo!',
                                    'class' => 'btn btn-default btn-xs',
                                    'disabled' => true,
                        ]);
                    },
                    'has_map' => function ($url, $model) {
                        return $model->localization_map <> '' ? Html::a('<span class="glyphicon glyphicon-map-marker" ></span>', ['view', 'id' => $model->id,'#' => 'map'], [
                                    'title' => 'Possui mapa',
                                    'class' => 'btn btn-default btn-xs',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Não possui mapa!',
                                    'class' => 'btn btn-default btn-xs',
                                    'disabled' => true,
                        ]);
                    },
                    'has_img' => function ($url, $model) {
                        return $model->visitsImages <> null ? Html::a('<span class="glyphicon glyphicon-camera" ></span>', ['view', 'id' => $model->id,'#' => 'img'], [
                                    'title' => 'Possui imagem',
                                    'class' => 'btn btn-default btn-xs',
                        ]): Html::a('<span class="glyphicon glyphicon-ban-circle" ></span>', "#", [
                                    'title' => 'Não possui imagem!',
                                    'class' => 'btn btn-default btn-xs',
                                    'disabled' => true,
                        ]);
                    },
                    'view' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open" ></span>', $url, [
                                    'title' => 'Visualizar',
                                    'class' => 'btn btn-default btn-xs',
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
                                    'title' => 'Alterar',
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
