<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

?>
<?php
	$t = Yii::$app->getRequest()->getQueryParam('id');
	$cod = $model->id;
	$dataProvider = new SqlDataProvider([
	    'sql' => "SELECT i.name as img
	    FROM visits_images i
	    WHERE i.business_visits_id = $t",
	    'totalCount' => 200,
	    'sort' =>false,
	    'key'  => 'img',
	    'pagination' => [
	        'pageSize' => 200,
	    ],
	]);
?>
<div class="visitsimages-form">

	<div class="row">
	  <div class="col-md-6">
	  	<div class="panel panel-default">
		  <div class="panel-heading"><strong>Enviar Imagem para Visita</strong></div>
		  <div class="panel-body">
		    <?php 
		    if ($dataProvider->count < Yii::$app->params['imglimit']) {
		    
		    $form = ActiveForm::begin([
		        'id' => 'visitsimagesform',
		        'options' => [
		            'enctype'=>'multipart/form-data',
		            ],
		    ]);
		    echo Html::activeHiddenInput($model, 'business_visits_id', ['value' => $t]);    

		    echo $form->field($model, 'file')->fileInput(['maxlength' => true]);
		    
		    echo Html::submitButton($model->isNewRecord ? 'Enviar' : 'Enviar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);

		    ActiveForm::end(); 
			} else {
				echo "<div class=\"alert alert-warning\" role=\"alert\">Você já enviou o máximo de imagens permitido!</div>";
			}

		    ?>
		    <p>
		    <hr/>
		    </p>
			<ul>
			  <li>Você ja adicionou <?php echo $dataProvider->count;?> </li>
			  <li>Você pode adicionar até <strong><?php echo Yii::$app->params['imglimit'];?></strong> imagens em cada visita</li>
			  <li>As imagens enviadas serão otimizadas e redimencionadas para o sistema</li>
			</ul>
			Voltar p detalhes da visita
  			</div>
  		  </div>
	</div>
	  <div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading"><strong>Gerenciar Imagens Armazenadas</strong></div>
		  <div class="panel-body">
            <?php Pjax::begin(['id' => 'pjax-container']) ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyText'    => '</br><p class="text-danger">Nenhum imagem anexada!</p>',
            'summary'      =>  '',
            'showHeader'   => false,
            'columns' => [
                    [
                    'attribute'=>'img',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(Yii::$app->params['imgPath'].$data["img"],
                            ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                    },                       
                    'contentOptions'=>['style'=>'width: 70%;text-align:left'],
                    ],
                    [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions'=>['style'=>'width: 10%;text-align:center'],
                    'controller' => 'visitsimages',
                    'template' => '{delete}',
                    'buttons' => [
                                'delete' => function ($url) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#', [
                                    'title' => 'Excluir Anexo',
                                    'aria-label' => 'Excluir',
                                    'onclick' => "
                                        if (confirm('Tem certeza que deseja excluir?')) {
                                            $.ajax('$url', {
                                                type: 'POST'
                                            }).done(function(data) {
                                                $.pjax.reload({container: '#pjax-container'});
                                            });
                                        }
                                        return false;
                                    ",
                                ]);
                            },


                    ],
                ],
            ],
            ]); ?>
            <?php Pjax::end() ?>
		  </div>
		</div>
	  </div>
	</div>



</div>
