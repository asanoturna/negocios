<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = 'Produtividade Diária';
// SELECT t2.name AS PRODUTO, SUM(t1.value) AS TOTAL
// FROM daily_productivity AS t1
// LEFT JOIN product AS t2 ON t1.product_id = t2.id 
// GROUP BY PRODUTO
?>
<div class="dailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>

<div class="row">
  <div class="col-md-6">
  	<div class="panel panel-default">
	  <div class="panel-heading">Rentabilidade</div>
	  <div class="panel-body">
	    
<?php
echo Highcharts::widget([

                    'options' => [
                        'credits' => ['enabled' => false],
                        'title' => [
                            'text' => '',
                        ],
                        'colors'=> ['#177c83','#27cdd9'],
                        'xAxis' => [
                            //'categories' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Nov', 'Dez'],
                            'categories' => $p,
                        ],
                        'yAxis' => [
                            'min' => 0,
                            'title' => '',
                        ],                        
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Produtos',
                                'data' => $t,
                            ],
                            // [
                            //     'type' => 'spline',
                            //     'name' => 'Evolução',
                            //     'data' => $quantity,
                            //     'marker' => [
                            //         'lineWidth' => 2,
                            //         'lineColor' => new JsExpression('Highcharts.getOptions().colors[7]'),
                            //         'fillColor' => 'white',
                            //     ],
                            // ],                           
                        ],
                    ]
                ]);
?>

	  </div>
	</div>
  </div>
  <div class="col-md-6">
  	<div class="panel panel-default">
	  <div class="panel-heading">Volume</div>
	  <div class="panel-body">
	    
		<?php
		
		echo Highcharts::widget([
			'options' => [
			    'plotOptions ' => 'pie',
			    'credits' => ['enabled' => false],
			    'chart'=> [
			    'height'=> 300,
			    ],
			    'title' => ['text' => ''],
			    'colors'=> ['#177c83','#27cdd9','#1fa4ae','#52d7e0','#7ee1e8','#a9ebf0'],
			    'tooltip'=> ['pointFormat'=> 'Percentual: <b>{point.percentage:.1f}%</b>'],
			    'plotOptions'=> [
			        'pie'=> [
			          'allowPointSelect'=> true,
			          'cursor'=> 'pointer',
			          'dataLabels'=> [
			          'enabled'=> true,
			          ],
			        'showInLegend'=> [
			          'enabled'=> true,
			          ]
			        ]
			    ],
			    'series'=> [[
			        'type'=> 'pie',
			        'name'=> 'Valor',
			        'data'=> [
			        //     ['Cadastro', $Cadastro[0]],
			        //     ['Correcao', $Correcao[0]],
			        //     ['Renovacao', $Renovacao[0]],
			        //     ['Regularizacao', $Regularizacao[0]],
			        'kkk',$t
			        ]
			    ]]
			]
			]);
		var_dump($t);
		?>	    
	  </div>
	</div>
  </div>
</div>

</div>