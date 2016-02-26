<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\User;


$this->title = 'Lista de Usuários';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>
<?= GridView::widget([
              'dataProvider' => $dataProviderUsers,
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
                            return Html::img(Yii::$app->request->BaseUrl.'/images/users/'.$data["avatar"],
                                ['width' => '50px', 'class' => 'img-rounded img-responsive']);
                        },
                        'contentOptions'=>['style'=>'width: 10%;text-align:middle'],                    
                    ],                                 
                    [
                        'attribute' => 'full_name',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["full_name"]."</br>".$data["username"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],  
                    [
                        'attribute' => 'email',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["email"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],                     
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'header' => '',
                        'value' => function ($data) {                      
                            return $data["status"]."</br>".$data["name"];
                        },
                        'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;'],
                    ],                                        
                ],
            ]); ?>
</div>
