<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\data\SqlDataProvider;

$this->title = 'Produtividade Diária';

?>
<div class="dailyproductivity-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>
SELECT t2.name AS PRODUTO, SUM(t1.value) AS TOTAL
FROM daily_productivity AS t1
LEFT JOIN product AS t2 ON t1.product_id = t2.id 
GROUP BY PRODUTO
<div class="row">
  <div class="col-md-6">
  	<div class="panel panel-default">
	  <div class="panel-heading">Rentabilidade</div>
	  <div class="panel-body">
	    Panel content
	  </div>
	</div>
  </div>
  <div class="col-md-6">
  	<div class="panel panel-default">
	  <div class="panel-heading">Volume</div>
	  <div class="panel-body">
	    Panel content
	  </div>
	</div>
  </div>
</div>

</div>