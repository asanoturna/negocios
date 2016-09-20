<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Ação Foco SIPAG';
?>
<div class="capitalaction-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php 
        // echo Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir', ['delete', 'id' => $model->id], [
        //     'class' => 'btn btn-danger',
        //     'data' => [
        //         'confirm' => 'Tem certeza que deseja excluir?',
        //         'method' => 'post',
        //     ],
        // ]) 
        ?>
    </p>

    <div class="panel panel-default">
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'establishmenttype',  
                'format' => 'raw',
                'value' => $model->Establishmenttype,
            ],
            'establishmentname',
            'address',
            'expedient',
            // ---
            [
                'attribute' => 'flag_sipag',  
                'format' => 'raw',
                'value' => $model->Flagsipag == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],
            [
                'attribute' => 'flag_sipag_locked',  
                'format' => 'raw',
                'value' => $model->Flagsipaglocked == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],
            [
                'attribute' => 'flag_rede',  
                'format' => 'raw',
                'value' => $model->Flagrede == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],
            [
                'attribute' => 'flag_rede_locked',  
                'format' => 'raw',
                'value' => $model->Flagredelocked == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],
            [
                'attribute' => 'flag_cielo',  
                'format' => 'raw',
                'value' => $model->Flagcielo == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],
            [
                'attribute' => 'flag_cielo_locked',  
                'format' => 'raw',
                'value' => $model->Flagcielolocked == 'SIM' ?  '<span class="glyphicon glyphicon-ok text-success" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-remove text-danger" aria-hidden="true"></span>',
            ],

            // ---            
            [
                'attribute' => 'visited',  
                'format' => 'raw',
                'value' => $model->Visited,
            ],
            [
                'attribute' => 'accredited',  
                'format' => 'raw',
                'value' => $model->Accredited,
            ],
            [
                'attribute' => 'accredited',  
                'format' => 'raw',
                'value' => $model->Accredited,
            ],
            [
                'attribute' => 'anticipation',  
                'format' => 'raw',
                'value' => $model->Anticipation,
            ],
            [
                'attribute' => 'status',  
                'format' => 'raw',
                'value' => $model->Status,
            ],             
            'user_id',
            [
                'attribute' => 'updated',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->updated))
            ],
            'observation:ntext',
        ],
    ]) ?>

    <hr/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'checkedby_id',
            [ 
                'attribute' => 'date',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],             
        ],
    ]) ?>    
    </div>
    </div>

</div>