<?php
use yii\helpers\Html;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = 'Administração';

?>
<div class="site-administration">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menuadmin'); ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

	<div class="row">
	  <div class="col-md-5">
		<div class="panel panel-default">
		  <div class="panel-heading">Estatísticas de Acesso</div>
		  <div class="panel-body">
			<?php
		    $command = Yii::$app->db->createCommand("SELECT
			count(id) as q,
			MONTH(logged_in_at) as m
			FROM user
			WHERE MONTH(logged_in_at)
			GROUP BY MONTH(logged_in_at)
						");
	        $access_stats = $command->queryAll();

	        $q = array();
	        $m = array();
	 
	        for ($i = 0; $i < sizeof($access_stats); $i++) {
	           $m[] = $access_stats[$i]["m"];
	           $q[] = (int) $access_stats[$i]["q"];
	        }						
		    ?> 		  
			<?php
					echo Highcharts::widget([
			                'options' => [
			                    'credits' => ['enabled' => false],
			                    'title' => [
			                        'text' => '',
			                    ],
			                    'colors'=> ['#00A295','#27cdd9'],
			                    'xAxis' => [
			                        'categories' => $m,
			                    ],
			                    'yAxis' => [
			                        'min' => 0,
			                        'title' => '',
			                    ],                        
			                    'series' => [
			                        [
			                            'type' => 'line',
			                            'name' => 'Qtde',
			                            'data' => $q,
			                        ],                          
			                    ],
			                ]
			            ]);
					?>
		  </div>
		</div>	  	
	  </div>
	  <div class="col-md-3">
		<div class="panel panel-default">
		  <div class="panel-heading">Novos Usuários</div>
		  <div class="panel-body">
			<?php
		    $dataProviderRecentUsers = new SqlDataProvider([
		        'sql' => "SELECT
						username,
						created_at
						FROM `user`
						ORDER BY created_at desc",
		        'totalCount' => 10,
		        'pagination' => [
		            'pageSize' => 10,
		        ],
		    ]);
		    ?>  
    		<?= GridView::widget([
	              'dataProvider' => $dataProviderRecentUsers,
	              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
	              'summary'      =>  '',
	              'showHeader'   => false,        
	              'tableOptions' => ['class'=>'table'],
	              'columns' => [                                
	                    [
	                        'format' => 'raw',
	                        'header' => 'Usuário',
	                        'value' => function ($data) {                      
	                            return $data["username"];
	                        },
	                        'contentOptions'=>['style'=>'text-align:left;vertical-align: middle;text-transform: lowercase'],
	                    ],  
	                    [
	                        'format' => 'raw',
	                        'header' => 'Contato',
	                        'value' => function ($data) {                      
	                            return $data["created_at"];
	                        },
	                        'format' => ['date', 'php:d/m/Y'],
	                    ],                                                           
	                ],
            ]); ?>
		  </div>
		</div>
	  </div>
	  <div class="col-md-4">
		<div class="panel panel-default">
		  <div class="panel-heading">Acessos Recentes</div>
		  <div class="panel-body">
			<?php
		    $dataProviderRecentAccess = new SqlDataProvider([
		        'sql' => "SELECT
						id, username,
						logged_in_at
						FROM `user`
						ORDER BY logged_in_at desc",
		        'totalCount' => 10,
		        'key'  => 'id',
		        'pagination' => [
		            'pageSize' => 10,
		        ],
		    ]);
		    ?>  
    		<?= GridView::widget([
	              'dataProvider' => $dataProviderRecentAccess,
	              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
	              'summary'      =>  '',
	              'showHeader'   => false,        
	              'tableOptions' => ['class'=>'table'],
	              'columns' => [                                
	                    [
	                        'attribute' => 'username',
	                        'format' => 'raw',
	                        'header' => 'Usuário',
	                        'value' => function ($data) {                      
	                            return $data["username"];
	                        },
	                        'contentOptions'=>['style'=>'text-align:left;vertical-align: middle;text-transform: lowercase'],
	                    ],  
	                    [
	                        'attribute' => 'email',
	                        'format' => 'raw',
	                        'header' => 'Contato',
	                        'value' => function ($data) {                      
	                            return $data["logged_in_at"];
	                        },
	                        'format' => ['date', 'php:d/m/Y'],
	                    ],                                                           
	                ],
            ]); ?>
		  </div>
		</div>
	  </div>
	</div>

    </div>
    </div>

</div>
