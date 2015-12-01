<?php

$this->title = Yii::$app->params['appname'];
?>
<div class="site-index">

    <div class="row">
    
    <div class="col-sm-3">
    <div class="panel panel-default">
	  <div class="panel-heading"><b>Módulos</b></div>
	  <div class="panel-body">
	    <?php  echo $this->render('_menu'); ?>
	  </div>
	</div>
    </div>
    <div class="col-sm-9">
	    
		  <div class="col-xs-6">
		  	<div class="panel panel-default">
			  <div class="panel-heading"><b>Visão Geral das Visitas</b></div>
			  <div class="panel-body">
			    <?php
			    use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;

echo Highcharts::widget([
    'scripts' => [
        //'modules/exporting',
        //'themes/grid-light',
    ],
    'options' => [
    'credits' => ['enabled' => false],
        'title' => [
            'text' => '',
        ],
        'xAxis' => [
            'categories' => ['Ago', 'Set', 'Out', 'Nov', 'Dez'],
        ],
        'labels' => [
            'items' => [
                [
                    'html' => 'Top 3 Gerentes',
                    'style' => [
                        'left' => '50px',
                        'top' => '18px',
                        'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                    ],
                ],
            ],
        ],
        'series' => [
            [
                'type' => 'column',
                'name' => 'Jane',
                'data' => [3, 2, 1, 3, 4],
            ],
            [
                'type' => 'column',
                'name' => 'John',
                'data' => [2, 3, 5, 7, 6],
            ],
            [
                'type' => 'column',
                'name' => 'Joe',
                'data' => [4, 3, 3, 9, 0],
            ],
            [
                'type' => 'spline',
                'name' => 'Average',
                'data' => [3, 2.67, 3, 6.33, 3.33],
                'marker' => [
                    'lineWidth' => 2,
                    'lineColor' => new JsExpression('Highcharts.getOptions().colors[3]'),
                    'fillColor' => 'white',
                ],
            ],
            [
                'type' => 'pie',
                'name' => 'Total por região',
                'data' => [
                    [
                        'name' => 'Jane',
                        'y' => 13,
                        'color' => new JsExpression('Highcharts.getOptions().colors[0]'), // Jane's color
                    ],
                    [
                        'name' => 'John',
                        'y' => 23,
                        'color' => new JsExpression('Highcharts.getOptions().colors[1]'), // John's color
                    ],
                    [
                        'name' => 'Joe',
                        'y' => 19,
                        'color' => new JsExpression('Highcharts.getOptions().colors[2]'), // Joe's color
                    ],
                ],
                'center' => [100, 80],
                'size' => 100,
                'showInLegend' => false,
                'dataLabels' => [
                    'enabled' => false,
                ],
            ],
        ],
    ]
]);
			    ?>
			  </div>
			</div>
		  </div>
		  <div class="col-xs-6">
		  	<div class="panel panel-default">
			  <div class="panel-heading"><b>Ranking Produtividade</b></div>
			  <div class="panel-body">
			    <table class="table"> <thead> <tr> <th>Posição</th> <th> </th> <th>Nome</th> <th>Valor</th> </tr> </thead> <tbody> <tr> <th scope="row">1</th> <td>Mark</td> <td>Otto</td> <td>155</td> </tr> <tr> <th scope="row">2</th> <td>Jacob</td> <td>Thornton</td> <td>129</td> </tr> <tr> <th scope="row">3</th> <td>Larry</td> <td>the Bird</td> <td>98</td> </tr> </tbody> </table>
			  </div>
			</div>
		  </div>
		
    </div>

    </div>
</div>
