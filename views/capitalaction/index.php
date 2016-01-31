<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Ação Capital';
?>
<div class="capitalaction-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Capitalaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',          
        'columns' => [
            'id',
            'name',
            'proposed',
            'accomplished',
            'date1',
            // 'date2',
            // 'progress:ntext',
            // 'created',
            // 'updated',
            // 'ip',
            // 'location_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
