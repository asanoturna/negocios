<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Solicitação de Recursos';
?>
<div class="resourcerequest-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'created',
            'client_name',
            'client_phone',
            'value_request',
            // 'expiration_register',
            // 'lastupdate_register',
            // 'value_capital',
            // 'observation:ntext',
            // 'has_transfer',
            // 'receive_credit',
            // 'add_insurance',
            // 'requested _month',
            // 'requested _year',
            // 'location_id',
            // 'user_id',
            // 'resource_type_id',
            // 'resource_purpose_id',
            // 'resource_status_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
