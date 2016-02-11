<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use app\models\User;
use yii\helpers\Url;
use yii\web\View;
use yii\data\SqlDataProvider;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = "Relatório por Usuário";
?>
<div class="visits-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>
	<div class="row">   
        <div class="col-md-3 pull-right"> 
                <?php 
                $this->registerJs('var submit = function (val){if (val > 0) {
                    window.location.href = "' . Url::to(['/visits/report_user']) . '&user_id=" + val;
                }
                }', View::POS_HEAD);
                echo Html::activeDropDownList($model, 'user_id', ArrayHelper::map(User::find()->where(['status' => 1])
                            ->orderBy("username ASC")
                            ->all(), 'id', 'username'), ['onchange'=>'submit(this.value);','prompt'=>'Usuário','class'=>'form-control']);
                ?>
        </div>
    </div>  
    </p>  
    <div class="row">
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Quantidade de Visitas por Situação</b></div>
          <div class="panel-body">
			<?php
			echo Highcharts::widget([
                'options' => [
                    'credits' => ['enabled' => false],
                    'title' => [
                        'text' => '',
                    ],
                    'colors'=> ['#00A295','#27cdd9'],
                    'xAxis' => [
                        'categories' => $stats,
                    ],
                    'yAxis' => [
                        'min' => 0,
                        'title' => '',
                    ],                        
                    'series' => [
                        [
                            'type' => 'column',
                            'name' => 'Produtos',
                            'data' => $total_s,
                        ],                         
                    ],
                ]
            ]);
			?>        	
          </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Quantidade de Visitas por Finalidade</b></div>
          <div class="panel-body">
			<?php
			echo Highcharts::widget([
                    'options' => [
                        'credits' => ['enabled' => false],
                        'title' => [
                            'text' => '',
                        ],
                        'colors'=> ['#00A295','#27cdd9'],
                        'xAxis' => [
                            'categories' => $finality,
                        ],
                        'yAxis' => [
                            'min' => 0,
                            'title' => '',
                        ],                        
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Produtos',
                                'data' => $total_f,
                            ],                          
                        ],
                    ]
                ]);
				?> 
            </div>
        </div>
        </div>
    </div>    

</div>