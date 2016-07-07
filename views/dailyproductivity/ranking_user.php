<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;
use yii\helpers\Url;
use yii\web\View;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-index">

<div class="row">
  <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
</div>
<hr/>
    <div class="row">
        <div class="col-md-2 pull-right"> 
            <?php 
            $this->registerJs('var submit = function (val){if (val > 0) {
                window.location.href = "' . Url::to(['/dailyproductivity/ranking_user']) . '&product_id=" + val;
            }
            }', View::POS_HEAD);
            echo Html::activeDropDownList($model, 'product_id', app\models\Product::getHierarchy(),  ['onchange'=>'submit(this.value);','prompt'=>'Todos os Produtos','class'=>'form-control required']);
            ?>
        </div>    
        <div class="col-md-2 pull-right">
        <?php
            $array = [
                ['id' => '01', 'name' => 'Janeiro'],
                ['id' => '02', 'name' => 'Fevereiro'],
                ['id' => '03', 'name' => 'Março'],
                ['id' => '04', 'name' => 'Abril'],
                ['id' => '05', 'name' => 'Maio'],
                ['id' => '06', 'name' => 'Junho'],
                ['id' => '07', 'name' => 'Julho'],
                ['id' => '08', 'name' => 'Agosto'],
                ['id' => '09', 'name' => 'Setembro'],
                ['id' => '10', 'name' => 'Outubro'],
                ['id' => '11', 'name' => 'Novembro'],
                ['id' => '12', 'name' => 'Dezembro'],
            ];
            $this->registerJs('var submit = function (mval){if (mval > 0) {
                window.location.href = "' . Url::to(['/dailyproductivity/ranking_user']) . '?mounth=" + mval;
            }
            }', View::POS_HEAD);
           echo Html::activeDropDownList($model, 'mounth', ArrayHelper::map($array, 'id', 'name'),['onchange'=>'submit(this.value);','class'=>'form-control']);
            ?>
        </div>
    </div>  
    </p>  
    <div class="row">
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Ranking de Vendas Por Receita</b></div>
          <div class="panel-body">
            <?= GridView::widget([
              'dataProvider' => $dataProviderValor,
              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
              'summary'      =>  '',
              'showHeader'   => true,        
              'tableOptions' => ['class'=>'table table-striped table-hover '],
              'columns' => [     
                    [
                        'attribute' => 'avatar',
                        'header' => '',
                        'format' => 'html',
                        'value' => function ($data) {
                            return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'seller',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) { 
                            return Html::a( $data["seller"], ['dailyproductivity/performance_user', 'seller_id' => $data["id"]], ['title' => 'Clique para ver o desempenho']);
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-transform: uppercase;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'confirmed',
                        'header' => 'Efetivado',
                        'format' => 'raw',
                        'value' => function ($data) {                      
                            return "<b class=\"text-success\">R$ ".$data["confirmed"]."</b>";
                        },
                        'headerOptions' => ['class' => 'text-success','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                        'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    ],    
                    [
                        'attribute' => 'unconfirmed',
                        'header' => 'Pendente',
                        'format' => 'raw',
                        'value' => function ($data) {                      
                            return "<b class=\"text-danger\">R$ ".$data["unconfirmed"]."</b>";
                        },
                        'headerOptions' => ['class' => 'text-danger','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                        'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    ],                        

                ],
            ]); ?>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading"><b>Ranking de Vendas Por Quantidade</b></div>
          <div class="panel-body">
            <?= GridView::widget([
              'dataProvider' => $dataProviderQtde,
              'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
              'summary'      =>  '',
              'showHeader'   => true,        
              'tableOptions' => ['class'=>'table table-striped table-hover '],
              'columns' => [     
                    [
                        'attribute' => 'avatar',
                        'format' => 'html',
                        'header' => '',
                        'value' => function ($data) {
                            return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:center'],                    
                    ],                                 
                    [
                        'attribute' => 'seller',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) { 
                                return Html::a( $data["seller"], ['dailyproductivity/performance_user', 'seller_id' => $data["id"]], ['title' => 'Clique para ver o desempenho']);
                            },
                        'contentOptions'=>['style'=>'width: 50%;text-transform: uppercase;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'confirmed',
                        'header' => 'Efetivado',
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
    </div>
</div>