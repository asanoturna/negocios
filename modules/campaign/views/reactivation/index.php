<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\User;
use app\modules\campaign\models\Reactivation;

$this->title = 'Reativação de Associados';
?>
<div class="capitalaction-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',  
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
        'rowOptions'   => function ($model, $index, $widget, $grid) {
            return [
                'id' => $model['id'], 
                'onclick' => 'location.href="'
                    . Yii::$app->urlManager->createUrl('campaign/reactivation/view') 
                    . '&id="+(this.id);',
                'style' => "cursor: pointer",
            ];
        }, 
        'columns' => [
            [
            'attribute' => 'id',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
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
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'user_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                return $model->user ? $model->user->username : null;
            },
            'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'client_name',
            'encodeLabel' => false,
            'format' => 'raw',
            'label' => 'Associado / <br/>CPF',
            'value' => function ($model) {
                  return $model->client_name."<p class=\"text-muted\">/ ".$model->client_doc."</p>";
            },
            'contentOptions'=>['style'=>'width: 18%;text-align:left'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            // [
            // 'attribute' => 'client_doc',
            // 'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            // 'headerOptions' => ['class' => 'text-center'],
            // ],
            [
            'attribute' => 'client_risk',
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'client_last_renovated_register',
            'encodeLabel' => false,
            'label' => 'Ultima<br/>Renovação<br/>Cadastral',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            'format' => ['date', 'php:d/m/Y'],
            ],
            [
            'attribute' => 'client_income',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'restrictions_serasa',
            'encodeLabel' => false,
            'label' => 'Restrição<br/>Serasa',
            'value' => function($data) {
              return $data->getSerasa();
            },
            'filter' => Reactivation::$Static_serasa,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'restrictions_ccf',
            'encodeLabel' => false,
            'label' => 'Restrição<br/>CCF',
            'value' => function($data) {
              return $data->getCcf();
            },
            'filter' => Reactivation::$Static_ccf,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'restrictions_scr',
            'encodeLabel' => false,
            'label' => 'Restrição<br/>SCR',
            'value' => function($data) {
              return $data->getScr();
            },
            'filter' => Reactivation::$Static_scr,
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions'=>['style'=>'text-align:center;vertical-align: middle;'],
            ],
            [
            'attribute' => 'agent_visit_number',
            'encodeLabel' => false,
            'label' => 'Número<br/>Relatório<br/>Visita',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'agent_registration_renewal',
            'encodeLabel' => false,
            'label' => 'Feita<br/>renovação<br/>cadastro',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'agent_overdraft_value',
            'encodeLabel' => false,
            'label' => 'Implantado<br/>Cheque<br/>Especial',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'agent_card_value',
            'encodeLabel' => false,
            'label' => 'Implantado<br/>C. de Crédito<br/>de R$',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'supervisor_package_rate',
            'encodeLabel' => false,
            'label' => 'Implantado<br/>P. Tarifário<br/>Reativação',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'manager_inactive_meeting',
            'encodeLabel' => false,
            'label' => 'Participou<br/>Reunião Mensal<br/>com Inativos',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            [
            'attribute' => 'manager_approval',
            'encodeLabel' => false,
            'label' => 'Aprovação<br/>Trabalho junto<br/>ao associado',
            'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            // [
            // 'class' => 'yii\grid\ActionColumn',
            // 'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            // ],
        ],
    ]); ?>
    </div></div>

</div>