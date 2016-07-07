<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

$this->title = 'Colaboradores';
?>
<div class="site-about">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'showHeader' => false,
        'summary' => false,
        'tableOptions' =>['class' => 'table'],
        'columns' => [
            [
            'attribute' => 'avatar',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img(Yii::$app->params['usersAvatars'].$model->avatar,
                    ['width' => '50px', 'class' => 'img-rounded img-responsive']);
            },
            'contentOptions'=>['style'=>'width: 6%;text-align:middle'],                    
            ],
            [
            'attribute' => 'fullname',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 50%;text-align:left;vertical-align: middle;text-transform: uppercase'],
            ],             
            [
            'attribute' => 'username',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 25%;text-align:left;vertical-align: middle;text-transform: lowercase'],
            ],             
            'email:email',            
        ],
    ]); ?>
  
    </div>
    </div>
</div>
