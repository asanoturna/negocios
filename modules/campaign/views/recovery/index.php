<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\campaign\models\Recovery;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\User;

$this->title = 'Campanha Recupere e Ganhe';
?>
<div class="recovery-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php
    use kartik\export\ExportMenu;
              $gridColumns = [
                  ['attribute'=>'id', 'hAlign'=>'right', 'width'=>'20px'], 
                  ['attribute'=>'clientname', 'hAlign'=>'right', 'width'=>'100px'], 
                  ['attribute'=>'clientdoc', 'hAlign'=>'right', 'width'=>'100px'],
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
                  [
                    'attribute'=>'negotiator_id',
                    'label'=> 'Negociador',
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return Html::a($model->user->username, '#', []);
                    },
                    'format'=>'raw'
                  ],
                  ['attribute'=>'value_traded','format'=>['decimal',2], 'hAlign'=>'right', 'width'=>'110px'],
                  ['attribute'=>'value_input','format'=>['decimal',2], 'hAlign'=>'right', 'width'=>'110px'],
                  [
                  'attribute'=>'typeproposed',
                  'label'=> 'Proposta',
                  'vAlign'=>'middle',
                  'width'=>'100px',
                  'value' => function($data) {
                      return $data->getTypeproposed();
                  },
                  'format'=>'raw'
                  ],
                  ['attribute'=>'commission','format'=>['decimal',2], 'hAlign'=>'right', 'width'=>'110px'],
                  [
                  'attribute'=>'status',
                  'label'=> 'Situação',
                  'vAlign'=>'middle',
                  'width'=>'100px',
                  'value' => function($data) {
                      return $data->getStatus();
                  },
                  'format'=>'raw'
                  ],

                  ['attribute'=>'date','format'=>['date'], 'hAlign'=>'right', 'width'=>'110px'],                 

                  [
                    'attribute'=>'approvedby',
                    'label'=> 'Aprovador Por',
                    'vAlign'=>'middle',
                    'width'=>'100px',
                    'value'=>function ($model, $key, $index, $widget) { 
                        return Html::a($model->checkedby->username, '#', []);
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
            'filename' => 'relatorio-campanha-sicoobcard-todo-dia',
            ]);
    ?> 
    </p>
    <div class="panel panel-default">
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],  
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            ],
            [
            'attribute' => 'clientname',
            'contentOptions'=>['style'=>'width: 15%;text-align:left'],
            ],            
            [
            'attribute' => 'clientdoc',
            'contentOptions'=>['style'=>'width: 8%;text-align:center'],
            ],             
            [
            'attribute' => 'location_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->location->shortname;
                    },  
            'filter' => ArrayHelper::map(Location::find()->orderBy('shortname')->asArray()->all(), 'id', 'shortname'),
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            ],             
            [
                'attribute' => 'negotiator_id',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->user ? $model->user->username : null;
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],            
            [
            'attribute' => 'value_traded',
            'value' => function ($model) {                      
                    return "R$ " . $model->value_traded;
                    },             
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],
            [
            'attribute' => 'value_input',
            'value' => function ($model) {                      
                    return "R$ " . $model->value_input;
                    },             
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],            
            [
                'attribute' => 'typeproposed',
                'enableSorting' => true,
                'value' => function($data) {
                  return $data->getTypeproposed();
                },
                'filter' => Recovery::$Static_typeproposed,
                'contentOptions'=>['style'=>'width: 8%;text-align:center'],
            ],            
            [
            'attribute' => 'commission',
            'value' => function ($model) {                      
                    return "R$ " . $model->commission;
                    },            
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],             
            [
                'attribute' => 'status',
                'enableSorting' => true,
                'format' => 'raw',
                'value' => function ($data) {                      
                        return $data->getStatus() == 'APROVADO' ? '<span class="label label-success">APROVADO</span>' : '<span class="label label-warning">PENDENTE</span>';
                        },  
                'filter' => Recovery::$Static_status,
                'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ],             
            [
              'attribute' => 'date',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 6%;text-align:center'],
              'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute' => 'approvedby',
                'format' => 'raw',
                'enableSorting' => true,
                'value' => function ($model) {                      
                    return $model->checkedby ? $model->checkedby->username : null;
                },
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'contentOptions'=>['style'=>'width: 8%;text-align:left'],
            ],            
            //'approvedin',
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Ações',  
              'contentOptions'=>['style'=>'width: 8%;text-align:right'],
              'headerOptions' => ['class' => 'text-center'],                            
              'template' => '{view} {update} {manager}',
              'buttons' => [
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
                      return Yii::$app->user->identity->can_managerproductivity == 1 ? Html::a('<span class="glyphicon glyphicon-cog" ></span>', $url, [
                                  'title' => 'Aprovar Registro',
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
    </div>
</div>