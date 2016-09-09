<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Person;
use app\modules\visits\models\Visitsfinality;
use app\modules\visits\models\Visitsstatus;
use app\modules\visits\models\Visitsimages;
use app\models\User;
use yii\bootstrap\Modal;


$this->title = 'Resumo Diário das Visitas';
?>
<div class="visits-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body"> 
    <?php
    echo kartik\grid\GridView::widget([
        'dataProvider'=>$dataProvider,
        'filterModel'=>$searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'showPageSummary'=>false,
        'showHeader' => true,
        'pjax'=>false,
        'striped'=>false,
        'summary' => false,
        'responsive'=>true,
        'hover'=>false,
        //'panel'=>['type'=>'default', 'heading'=>'Lista agrupada por Unidades'],
        'export'=>[
            'fontAwesome' => true,
            'showConfirmAlert' => false,
            'target' => kartik\grid\GridView::TARGET_BLANK,
        ],
        'exportConfig' => [
            kartik\export\ExportMenu::EXCEL => true,
            //kartik\export\ExportMenu::PDF => false,
        ],
        //'toolbar' => true,
        //'panel'=>['type'=>'primary', 'heading'=>'Grid Grouping Example'],
        'rowOptions'   => function ($model, $index, $widget, $grid) {
            return [
                'id' => $model['id'], 
                'onclick' => 'location.href="'
                    . Yii::$app->urlManager->createUrl('visits/visits/view') 
                    . '&id="+(this.id);',
                'style' => "cursor: pointer",
            ];
        },    
        'columns'=>[
            [
                'attribute'=>'location_id', 
                //'width'=>'310px',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->location->fullname;
                },
                //'filterType'=>GridView::FILTER_SELECT2,
                //'filter'=>ArrayHelper::map(Location::find()->orderBy('fullname')->asArray()->all(), 'id', 'fullname'), 
                // 'filterWidgetOptions'=>[
                //     'pluginOptions'=>['allowClear'=>true],
                // ],
                //'filterInputOptions'=>['placeholder'=>'Any supplier'],
                'group'=>true,
                'groupedRow'=>true,
                'groupOddCssClass'=>'h4 bg-success',
                'groupEvenCssClass'=>'h4 bg-success',
                'contentOptions'=>['style'=>'width: 15%;text-align:center'],
            ],
            [
            'attribute' => 'date',
            //'filter' => false,
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            'format' => ['date', 'php:d/m/Y'],
            ],            
            [
                'attribute'=>'user_id',
                'label'=> 'Usuário',
                'vAlign'=>'middle',
                'width'=>'100px',
            'value' => function ($model) {
                         return Html::a($model->user->fullname, ['visits/report_user', 'user_id' => $model->user_id]);
                     },
                'format'=>'raw',
                'contentOptions'=>['style'=>'width: 20%;text-align:left;text-transform: uppercase'],
            ],
            [
            'attribute' => 'company_person',
            'contentOptions'=>['style'=>'width: 20%;text-align:left;text-transform: uppercase'],
            'headerOptions' => ['class' => 'text-center'],
            ],             
            [
            'attribute' => 'visits_finality_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                    return $model->visitsFinality->name;
                    },
            'filter' => ArrayHelper::map(VisitsFinality::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 20%;text-align:center;text-transform: uppercase'],
            'headerOptions' => ['class' => 'text-center'],
            ],                  
            [
            'attribute' => 'visits_status_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function ($model) {                      
                  return '<span style="color:'.$model->visitsStatus->hexcolor.'">'.$model->visitsStatus->name.'</span>';
                  },
            'filter' => ArrayHelper::map(VisitsStatus::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
            'contentOptions'=>['style'=>'width: 20%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],             
        ],
    ]);
    ?>
    </div>
    </div>
</div>