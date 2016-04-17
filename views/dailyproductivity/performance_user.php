<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Location;
use app\models\Product;
use app\models\Modality;
use app\models\User;
use yii\widgets\ActiveForm;
use yii\data\SqlDataProvider;
use yii\helpers\Url;
use yii\web\View;
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-index">

<div class="row">
  <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
  <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
</div>

<hr/>

<div class="row">	

	<div class="container-fluid pull-right">

<?php  echo $this->render('_search_user', ['model' => $searchModel]); ?>  

    </div>

</div>

<div class="row">

</div>

</div>