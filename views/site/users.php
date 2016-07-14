<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;

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

    <?php
    echo kartik\grid\GridView::widget([
        'dataProvider'=>$dataProvider,
        //'filterModel'=>$searchModel,
        'showPageSummary'=>false,
        'showHeader' => false,
        'pjax'=>false,
        'striped'=>false,
        'summary' => false,
        'responsive'=>true,
        'hover'=>false,
        'panel'=>['type'=>'default', 'heading'=>'Lista agrupada por Unidades'],
        'export'=>[
            'fontAwesome' => true,
            'showConfirmAlert' => false,
            'target' => kartik\grid\GridView::TARGET_BLANK,
        ],
        'exportConfig' => [
            kartik\export\ExportMenu::EXCEL => true,
            //kartik\export\ExportMenu::PDF => false,
        ],
        'toolbar' => false,
        'panel'=>[
            'type'=>false,
            'heading'=>false
        ],         
        'columns'=>[
            [
                'attribute'=>'location_id', 
                'width'=>'310px',
                'value'=>function ($model, $key, $index, $widget) { 
                    return $model->location->fullname;
                },
                //'filterType'=>GridView::FILTER_SELECT2,
                //'filter'=>ArrayHelper::map(Location::find()->orderBy('fullname')->asArray()->all(), 'id', 'fullname'), 
                // 'filterWidgetOptions'=>[
                //     'pluginOptions'=>['allowClear'=>true],
                // ],
                //'filterInputOptions'=>['placeholder'=>'Any supplier'],
                'group'=>true,
                'groupedRow'=>true,
                'groupOddCssClass'=>'h4 bg-success',
                'groupEvenCssClass'=>'h4 bg-success',
            ],
            [
            'attribute' => 'avatar',
            'format' => 'raw',
            'value' => function ($model) {
                return Html::img(Yii::$app->params['usersAvatars'].$model->avatar,
                    ['width' => '50px', 'class' => 'img-rounded img-thumbnail']);
            },
            'contentOptions'=>['style'=>'width: 5%;text-align:middle'], 
            ],            
            [
            'attribute' => 'fullname',
            'format' => 'html',
            'value' => function ($model) {
                return "<p class=\"text-uppercase\"><strong>".$model->fullname."</strong></p><em class=\"text-lowercase\">".$model->username."</em>";
            },               
            'contentOptions'=>['style'=>'width: 40%;text-align:left;vertical-align: middle'],
            ],     
            [
            'attribute' => 'email',
            'format' => 'raw',
            'value' => function ($model) {
                return $model->email != '' ? '<i class="fa fa-envelope" aria-hidden="true"></i> '.Html::mailto($model->email,$model->email) : '<i class="fa fa-envelope" aria-hidden="true"></i> <span class="text-danger"><em>Não informado</em></span>';
            },               
            'contentOptions'=>['style'=>'width: 30%;text-align:left;vertical-align: middle'],
            ],                      
            [
            'attribute' => 'phone',
            'format' => 'html',
            'value' => function ($model) {
                return $model->phone != '' ? '<i class="fa fa-phone" aria-hidden="true"></i> '.$model->phone : '<i class="fa fa-phone" aria-hidden="true"></i> <span class="text-danger"><em>Não informado</em></span>';
            },               
            'contentOptions'=>['style'=>'width: 25%;text-align:left;vertical-align: middle'],
            ],              
        ],
    ]);
    ?>
    </div>
    </div>
</div>