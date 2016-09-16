<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Campanha Recupere e Ganhe - #' . $model->id;
?>
<div class="recovery-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        // Html::a('Excluir', ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Confirma exclusão?',
        //         'method' => 'post',
        //     ],
        // ]) 
        ?>
    </p>

    <div class="panel panel-default">
    <div class="panel-heading"><b>Informações</b></div>
    <div class="panel-body">    

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'negotiator_id',
            'location_id',
            'clientname',
            'clientdoc',
            'contracts',
            'value_traded',
            'value_input',
            [ 
                'attribute' => 'typeproposed',  
                'format' => 'raw',
                'value' => $model->Typeproposed,
            ],              
            'commission',           
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],            
        ],
    ]) ?>

    </div>
    </div>

<div class="panel panel-default">
<div class="panel-heading"><b>Situação</b></div>
    <div class="panel-body">    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [ 
                'attribute' => 'status',  
                'format' => 'raw',
                'value' => $model->Status,
            ],              
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ], 
            'approvedby',
            [ 
                'attribute' => 'approvedin',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->approvedin))
            ],             
        ],
    ]) ?>

    </div>
    </div>    

</div>