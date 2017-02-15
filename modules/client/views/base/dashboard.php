<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\client\models\Base;
use app\modules\client\models\Category;

$this->title = 'Estatísticas';
?>
<div class="category-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="panel panel-default">
          <div class="panel-heading">Estatísticas Gerais</div>
          <div class="panel-body">

    <ul class="list-group">
        <li class="list-group-item">
        <span class="badge"><?=Base::find()->where(['category_id'=>0])->count()?></span>DIAMANTE
        </li>
        <li class="list-group-item">
        <span class="badge"><?=Base::find()->where(['category_id'=>1])->count()?></span>ESMERALDA
        </li>
        <li class="list-group-item">
        <span class="badge"><?=Base::find()->where(['category_id'=>2])->count()?></span>RUBI
        </li>
        <li class="list-group-item">
        <span class="badge"><?=Base::find()->where(['category_id'=>3])->count()?></span>SAFIRA
        </li>
        <li class="list-group-item">
        <span class="badge"><?=Base::find()->where(['category_id'=>4])->count()?></span>TOPÁZIO
        </li> 
    </ul>         
    </div>
    </div>
</div>
