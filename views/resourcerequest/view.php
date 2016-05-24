<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = "Solicitação #" . $model->id;

?>
<div class="resourcerequest-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'confirma exclusão do registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created',
            'client_name',
            'client_phone',
            'value_request',
            'value_capital',            
            [ 
                'attribute' => 'expiration_register',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->expiration_register))
            ],             
            [ 
                'attribute' => 'lastupdate_register',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->lastupdate_register))
            ],                         
            'has_transfer',
            'receive_credit',
            'add_insurance',
            'requested_month',
            'requested_year',
            'location_id',
            'user_id',
            'resource_type',
            'resource_purposes',
            'resource_status_id',
            [ 
                'label' => 'Usuário',
                'format' => 'raw',
                'value' => $model->user->username,
            ],              
            'observation:ntext',
        ],
    ]) ?>

</div>
