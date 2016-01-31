<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Visitas dos Gerentes';
?>
<div class="visits-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-hover'],
        'emptyText'    => '</br><p class="text-info">Nenhum registro encontrado!</p>',          
        'columns' => [
            'id',
            'date',
            'responsible',
            'company_person',
            'contact',
            // 'email:email',
            // 'phone',
            // 'value',
            // 'num_proposal',
            // 'observation:ntext',
            // 'created',
            // 'updated',
            // 'ip',
            // 'attachment',
            // 'localization_map',
            // 'visits_finality_id',
            // 'visits_status_id',
            // 'person_id',
            // 'location_id',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
