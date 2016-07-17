<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Campanha Sicoobcard Todo Dia - #' . $model->name;
?>
<div class="campaign-sicoobcard-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
      <?= Html::a('Registros', ['index'], ['class' => 'btn btn-success']) ?>
      </span></div>      
    </div>
    <hr/>

    <p class="pull-right">
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma exclusão do registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [ 
                'attribute' => 'product_type',  
                'format' => 'raw',
                'value' => $model->ProductType,
            ],             
            'name',
            'card',
            [ 
                'attribute' => 'purchasedate',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->purchasedate))
            ],              
            'purchasevalue',
            'purchaselocal',
            [ 
                'label' => 'Usuário',
                'format' => 'raw',
                'value' => $model->user->username,
            ],             
            [ 
                'attribute' => 'created',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->created))
            ],  
            [ 
                'attribute' => 'updated',
                'format' => 'raw',
                //'value' => date("d/m/Y",  strtotime($model->updated))
                'value' => $model->updated == null ? 'Sem alteração' : date("d/m/Y",  strtotime($model->updated)),                
            ],                          
        ],
    ]) ?>

</div>
