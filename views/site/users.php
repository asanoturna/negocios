<?php
use yii\helpers\Html;
use kartik\sidenav\SideNav;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Person;


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
    //use kartik\grid\GridView;
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
                'filter'=>ArrayHelper::map(Location::find()->orderBy('fullname')->asArray()->all(), 'id', 'fullname'), 
                // 'filterWidgetOptions'=>[
                //     'pluginOptions'=>['allowClear'=>true],
                // ],
                //'filterInputOptions'=>['placeholder'=>'Any supplier'],
                'group'=>true,  // enable grouping,
                'groupedRow'=>true,                    // move grouped column to a single grouped row
                'groupOddCssClass'=>'kv-grouped-row',  // configure odd group cell css class
                'groupEvenCssClass'=>'kv-grouped-row', // configure even group cell css class
            ],
            [
            'header' => false,
            'attribute' => 'avatar',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img(Yii::$app->params['usersAvatars'].$model->avatar,
                    ['width' => '50px', 'class' => 'img-rounded img-thumbnail']);
            },
            'contentOptions'=>['style'=>'width: 6%;text-align:middle'], 
            ],            
            [
                'attribute'=>'fullname',
            ],            
            [
                'attribute'=>'username',
            ],
            // [
            //     'class'=>'kartik\grid\FormulaColumn',
            //     'header'=>'Amount In Stock',
            //     'value'=>function ($model, $key, $index, $widget) { 
            //         $p = compact('model', 'key', 'index');
            //         return $widget->col(4, $p) * $widget->col(5, $p);
            //     },
            //     'mergeHeader'=>true,
            //     'width'=>'150px',
            //     'hAlign'=>'right',
            //     'format'=>['decimal', 2],
            //     'pageSummary'=>true
            // ],
        ],
    ]);



     ?>
  
    </div>
    </div>
</div>
