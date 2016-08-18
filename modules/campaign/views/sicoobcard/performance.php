<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\View;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use app\modules\campaign\models\Sicoobcard;

$this->title = 'Desempenho da Campanha Sicoobcard Todo Dia';
?>
<div class="campaign-sicoobcard-create">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div></div>      
    </div>
    <hr/>

  <div class="row">

    <div class="col-md-4">

    <div class="panel panel-default">
      <div class="panel-heading"><b>Comparação por Tipo de Produto</b></div>
      <div class="panel-body" style="height: 550px;max-height: 500;">
        <?php
                echo Highcharts::widget([
                'options' => [
                    'credits' => ['enabled' => false],
                    'chart'=> [
                    'height'=> 350,
                    ],
                    'title' => [
                        'text' => '',
                        'align' => 'center',
                        'verticalAlign' => 'middle',
                          'style' => [
                              'color' => '#0C3E45',
                          ] 
                        ],
                    'colors'=> ['#13AE9C','#BDD530'],
                    'tooltip'=> ['pointFormat'=> 'Percentual: <b>{point.percentage:.1f}%</b>'],
                    'plotOptions'=> [
                        'pie'=> [
                            'allowPointSelect'=> true,
                            'cursor'=> 'pointer',
                            'size'=> '100%',
                            'innerSize'=> '60%',
                            'dataLabels'=> [
                                'enabled'=> true,
                            ],
                            'center'=> ['50%', '55%'],
                        ]
                    ],
                    'series'=> [[
                        'type'=> 'pie',
                        'name'=> 'Valor',
                        'data'=> [
                            ['Ativação',  abs(round((int)$totalActivation))],
                            ['Reativação', abs(round((int)$totalReactivation))],
                        ]
                    ]]
                ]
                ]);
                ?>

    <br/>
    <ul class="list-group">
      <li class="list-group-item">
        <span class="badge"><?php echo $totalActivation;?></span>
        Total Ativação
      </li>
      <li class="list-group-item">
        <span class="badge"><?php echo $totalReactivation;?></span>
        Total Reativação
      </li>      
    </ul>

      </div>
    </div>   

    </div>

    <div class="col-md-4">

    <div class="panel panel-default">
      <div class="panel-heading"><b>Quantidade por Colaborador</b></div>
      <div class="panel-body" style="height: 550px;max-height: 500;overflow-y: scroll;">
        <?= GridView::widget([
              'dataProvider' => $dataPerformanceUser,
              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
              'summary'      =>  '',
              'showHeader'   => true,        
              'tableOptions' => ['class'=>'table table-striped table-hover '],
              'columns' => [     
                    [
                        'attribute' => 'avatar',
                        'label' => false,
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-thumbnail']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'fullname',
                        'format' => 'raw',
                        'label' => false,
                        'value' => function ($data) { 
                            return $data["fullname"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-transform: uppercase;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'confirmed',
                        'header' => 'Aprovado',
                        'format' => 'raw',
                        'value' => function ($data) {                      
                            return "<b class=\"text-success\">".$data["confirmed"]."</b>";
                        },
                        'headerOptions' => ['class' => 'text-success','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                        'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    ],    
                    [
                        'attribute' => 'unconfirmed',
                        'header' => 'Pendente',
                        'format' => 'raw',
                        'value' => function ($data) {                      
                            return "<b class=\"text-danger\">".$data["unconfirmed"]."</b>";
                        },
                        'headerOptions' => ['class' => 'text-danger','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                        'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    ],                        

                ],
            ]); ?>
      </div>
    </div>

    </div>
    <div class="col-md-4">

    <div class="panel panel-default">
      <div class="panel-heading"><b>Quantidade por Local</b></div>
      <div class="panel-body" style="height: 550px;max-height: 500;overflow-y: scroll;">
        <?= GridView::widget([
          'dataProvider' => $dataPerformanceLocation,
          'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
          'summary'      =>  '',
          'showHeader'   => true,        
          'tableOptions' => ['class'=>'table table-striped table-hover '],
          'columns' => [ 
                [
                    'attribute' => 'fullname',
                    'label' => false,
                    'format' => 'html',
                    'value' => function ($data) {                      
                        return $data["fullname"];
                    },
                    'contentOptions'=>['style'=>'width: 50%;text-align:left'],                    
                ],                                  
                [
                    'attribute' => 'confirmed',
                    'header' => 'Aprovado',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b class=\"text-success\">".$data["confirmed"]."</b>";
                    },
                    'headerOptions' => ['class' => 'text-success','style'=>'width: 25%;text-align:right;vertical-align: middle;'],
                    'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                ],    
                [
                    'attribute' => 'unconfirmed',
                    'header' => 'Pendente',
                    'format' => 'raw',
                    'value' => function ($data) {                      
                        return "<b class=\"text-danger\">".$data["unconfirmed"]."</b>";
                    },
                    'headerOptions' => ['class' => 'text-danger','style'=>'width: 25%;text-align:right;vertical-align: middle;'],
                    'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                ],                                     

            ],
        ]); ?>
      </div>
    </div>

    </div>
  </div>

</div>
