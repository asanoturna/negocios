<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\client\models\Base;
use app\modules\client\models\Category;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = 'Base de Associados';
?>
<div class="category-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="panel panel-default">
    <div class="panel-heading"><strong><i class="fa fa-line-chart" aria-hidden="true"></i> Estatísticas</strong></div>
    <div class="panel-body">
    <div class="row">
      <div class="col-md-3">
      <?php
          $diamante     = Base::find()->where(['category_id'=>0])->count();
          $esmeralda    = Base::find()->where(['category_id'=>1])->count();
          $rubi         = Base::find()->where(['category_id'=>2])->count();
          $safira       = Base::find()->where(['category_id'=>3])->count();
          $topazio      = Base::find()->where(['category_id'=>4])->count();

          $diamante_color   = '#A9ABAD';
          $esmeralda_color  = '#C0D73E';
          $rubi_color       = '#79C14E';
          $safira_color     = '#00B0A0';
          $topazio_color    = '#2A444C';

                echo Highcharts::widget([
                'options' => [
                    'credits' => ['enabled' => false],
                    'chart'=> [
                    'height'=> 220,
                    ],
                    'title' => [
                        'text' => '',
                        'align' => 'center',
                        'verticalAlign' => 'middle',
                          'style' => [
                              'color' => '#0C3E45',
                          ] 
                        ],
                    'colors'=> [$diamante_color, $esmeralda_color, $rubi_color, $safira_color, $topazio_color],
                    'tooltip'=> ['pointFormat'=> 'Percentual: <b>{point.percentage:.1f}%</b>'],
                    'plotOptions'=> [
                        'pie'=> [
                            'allowPointSelect'=> true,
                            'cursor'=> 'pointer',
                            //'size'=> '100%',
                            //'innerSize'=> '60%',
                            'dataLabels'=> [
                                'enabled'=> true,
                                'color' => '#003A41',
                            ],
                            'center'=> ['50%', '55%'],
                        ]
                    ],
                    'series'=> [[
                        'type'=> 'pie',
                        'name'=> 'Valor',
                        'data'=> [
                            ['Diamante',  abs(round((int)$diamante))],
                            ['Esmeralda', abs(round((int)$esmeralda))],
                            ['Rubi', abs(round((int)$rubi))],
                            ['Safira', abs(round((int)$safira))],
                            ['Topazio', abs(round((int)$topazio))],
                        ]
                    ]]
                ]
                ]);
            ?>
      </div>
      <div class="col-md-3">
      <ul class="list-group">
          <li class="list-group-item">
          <span class="badge"><?=$diamante?></span><span style="color:<?=$diamante_color?>">DIAMANTE</span>
          </li>
          <li class="list-group-item">
          <span class="badge"><?=$esmeralda?></span><span style="color:<?=$esmeralda_color?>">ESMERALDA</span>
          </li>
          <li class="list-group-item">
          <span class="badge"><?=$rubi?></span><span style="color:<?=$rubi_color?>">RUBI</span>
          </li>
          <li class="list-group-item">
          <span class="badge"><?=$safira?></span><span style="color:<?=$safira_color?>">SAFIRA</span>
          </li>
          <li class="list-group-item">
          <span class="badge"><?=$topazio?></span><span style="color:<?=$topazio_color?>">TOPÁZIO</span>
          </li> 
      </ul> 
      </div>
      <div class="col-md-3"></div>
      <div class="col-md-3"></div>
    </div>
    </div>
    </div>

    <div class="panel panel-default">
    <div class="panel-body">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
              //'id',
              'account',
              'name',
              'doc',
            [
            'attribute' => 'category_id',
            'format' => 'raw',
            'enableSorting' => true,
            'value' => function($data) {
                  return $data->getCategory();
                },
                'filter' => Base::$Static_category,
            'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            'headerOptions' => ['class' => 'text-center'],
            ],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
    </div>
</div>
