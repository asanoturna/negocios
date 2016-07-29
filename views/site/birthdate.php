<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Aniversariantes do Mês';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?= Html::encode($this->title) ?></h1>
    <hr/>
  
    <?php
    $dataProviderBirthdate = new SqlDataProvider([
        'sql' => "SELECT
                avatar, fullname, day(birthdate) as dia
                FROM user   
                WHERE MONTH(birthdate) = MONTH(Now()) 
                ORDER BY day(birthdate)",
        'totalCount' => 300,
        'key'  => 'fullname',
        'pagination' => [
            'pageSize' => 300,
        ],
    ]);
    ?>  

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
          <div class="panel-body" style="background: url(<?php echo Yii::$app->request->baseUrl;?>/images/birthdate1.png) !important;background-repeat: repeat-y;background-size: cover;">
                <?= GridView::widget([
                  'dataProvider' => $dataProviderBirthdate,
                  'emptyText'    => '</br><p class="text-danger">Nenhum aniversariante encontrado</p>',
                  'summary'      =>  '',
                  'showHeader'   => true,        
                  'tableOptions' => ['class'=>'table'],
                  'columns' => [     
                        [
                            'attribute' => 'avatar',
                            'label' => false,
                            'format' => 'raw',
                            'value' => function ($data) {
                                return Html::img(Yii::$app->params['usersAvatars'].$data["avatar"],
                                    ['width' => '50px', 'class' => 'img-rounded img-thumbnail img-responsive']);
                            },
                            'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                        ],                                 
                        [
                            'attribute' => 'fullname',
                            'format' => 'raw',
                            'header' => 'Colaborador',
                            'value' => function ($data) {                      
                                return "<h4>".$data["fullname"]."</h4>";
                            },
                            'contentOptions'=>['style'=>'width: 60%;text-align:left;vertical-align: middle;text-transform: uppercase'],
                        ],
                        [
                            'attribute' => 'dia',
                            'format' => 'raw',
                            'header' => 'Dia',
                            'value' => function ($data) {                      
                                return "<h4>".$data["dia"]."</h4>";
                            },
                            'headerOptions' => ['class' => 'text-center', 'style' => 'text-align:center;vertical-align: middle;'],
                            'contentOptions'=>['style'=>'width: 30%;text-align:center;vertical-align: middle;'],
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
