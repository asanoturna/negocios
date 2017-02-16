<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\client\models\Base;
use app\modules\client\models\Category;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = 'Estatísticas';
?>
<div class="category-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
      <div class="col-md-6">

<div class="panel panel-default">
          <div class="panel-heading">Linha de Crédito</div>
          <div class="panel-body">
          <?php
          $diamante     = Base::find()->where(['category_id'=>0])->count();
          $esmeralda    = Base::find()->where(['category_id'=>1])->count();
          $rubi         = Base::find()->where(['category_id'=>2])->count();
          $safira       = Base::find()->where(['category_id'=>3])->count();
          $topazio      = Base::find()->where(['category_id'=>4])->count();

          $diamante_color   = '#7CB5EC';
          $esmeralda_color  = '#2A9636';
          $rubi_color       = '#FF2626';
          $safira_color     = '#F7A35C';
          $topazio_color    = '#8085E9';

                echo Highcharts::widget([
                'options' => [
                    'credits' => ['enabled' => false],
                    'chart'=> [
                    'height'=> 300,
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
    <ul class="list-group">
        <li class="list-group-item">
        <span class="badge"><?=$diamante?></span>DIAMANTE
        </li>
        <li class="list-group-item">
        <span class="badge"><?=$esmeralda?></span>ESMERALDA
        </li>
        <li class="list-group-item">
        <span class="badge"><?=$rubi?></span>RUBI
        </li>
        <li class="list-group-item">
        <span class="badge"><?=$safira?></span>SAFIRA
        </li>
        <li class="list-group-item">
        <span class="badge"><?=$topazio?></span>TOPÁZIO
        </li> 
    </ul>    
    </div>
    </div>

      </div>
      <div class="col-md-6">.col-md-6</div>
    </div>
</div>
