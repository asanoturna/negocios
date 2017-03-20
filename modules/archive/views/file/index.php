<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\archive\models\File;
use app\modules\archive\models\Category;
use app\models\User;

$this->title = 'Arquivos';
?>
<div class="file-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('/file/_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
      <div class="panel-body">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>

    <div class="panel panel-default">
    <div class="panel-body"> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-hover'],
        'emptyText'    => 'Nenhum arquivo encontrado!',
        'summary'      =>  '',
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '<span class="not-set">--</span>'
            ],
        'columns' => [
            [
            'attribute' => 'id',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'filetype',
            'label' => '',
            'enableSorting' => true,
            'format' => 'raw',
            'value' => function ($model) {
                   return  $model->getType();
               },
            'contentOptions'=>['style'=>'width: 8%;text-align:right'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            'name',
            //'description',
            [
            'attribute' => 'created',
            'enableSorting' => true,
            'format' => ['date', 'php:d/m/Y'],
            'value' => function ($model) {                      
                    return $model->created;
                    },
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'updated',
            'enableSorting' => true,
            'format' => ['date', 'php:d/m/Y'],
            'value' => function ($model) {                      
                    return $model->updated;
                    },
            'contentOptions'=>['style'=>'width: 8%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'user_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {
                         return $model->responsible->username;
                     },            
            'filter' => ArrayHelper::map(User::find()->where(['status' => 1])->orderBy('username')->asArray()->all(), 'id', 'username'),
            'filterInputOptions' => ['class' => 'form-control', 'style'=>'text-transform: lowercase'],
            'contentOptions'=>['style'=>'width: 10%;text-align:left;text-transform: lowercase'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'downloads',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->downloads;
                    },
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'filesize',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->filesize;
                    },
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{download} {update} ',
                'header' => 'Ações',
                'headerOptions' => ['class' => 'text-center'],
                'visibleButtons' => [
                    'download' => true,
                    'update' => Yii::$app->user->identity->role_id == 99,
                ],
                'buttons' => [
                    'download' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-cloud-download" ></span>', Yii::$app->params['reportbasePath'].'/'. $model->attachment, [
                                    'title' => 'Baixar Arquivo',
                                    'target' => '_blank',
                                    'class' => 'btn btn-default btn-xs',
                        ]);
                    },                
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-refresh" ></span>', $url, [
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
                'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],
        ],
    ]); ?>
    </div>
    </div>
</div>
