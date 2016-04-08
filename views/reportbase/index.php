<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Planilha Base';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reportbase-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
        <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
            <?= Html::a('Novo', ['create'], ['class' => 'btn btn-success']) ?></span>
        </div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //'id',
            'filename',
            'updated',
            'downloads',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
