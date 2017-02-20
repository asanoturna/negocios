<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

$this->title = 'Novo Produto';
?>
<div class="product-create">

<div class="row">
  <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('/dailyproductivity/_menu'); ?></span></div>
</div>

<hr/>

	<div class="panel panel-default">
  	<div class="panel-body">

	<?php
    echo Tabs::widget([
        'items' => [
            [
                'label' => 'Produtividade',
                'url' => ['managerdailyproductivity/index'],
            ],
            [
                'label' => 'Categorias',
                'url' => ['product/index'],
                'active' => true
            ],
            [
                'label' => 'Metas',
                'url' => '#',
                'headerOptions' => ['class' => 'disabled'],
            ],
        ],
    ]);
    ?>
    <br/>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
    </div>

</div>
