<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\campaign\models\Sipag;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\User;

$this->title = 'Ranking da Campanha Ação Foco SIPAG';
?>
<div class="recovery-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body">

<div class="row">
  <div class="col-md-6">

<div class="panel panel-default">
<div class="panel-heading"><b>Colaborador</b></div>
<div class="panel-body" style="height: 550px;max-height: 500;overflow-y: scroll;">
<?= GridView::widget([
              'dataProvider' => $dataRankingUser,
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
                        'attribute' => 'aprovado',
                        'header' => 'Aprovado',
                        'format' => 'raw',
                        'value' => function ($data) {                      
                            return "<b class=\"text-success\">".$data["aprovado"]."</b>";
                        },
                        'headerOptions' => ['class' => 'text-success','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                        'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    ],    
                    // [
                    //     'attribute' => 'pendente',
                    //     'header' => 'Pendente',
                    //     'format' => 'raw',
                    //     'value' => function ($data) {                      
                    //         return "<b class=\"text-danger\">".$data["pendente"]."</b>";
                    //     },
                    //     'headerOptions' => ['class' => 'text-danger','style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    //     'contentOptions'=>['style'=>'width: 20%;text-align:right;vertical-align: middle;'],
                    // ],
                ],
            ]); ?>
</div></div>

  </div>
  <div class="col-md-6">

    <!--     
    <div class="panel panel-default">
      <div class="panel-heading"><b>Ranking por Agência</b></div>
      <div class="panel-body" style="height: 550px;max-height: 500;overflow-y: scroll;">
        
      </div>
    </div>
    -->

 </div>
</div>

    </div>
    </div>
</div>