<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Ação Capital';
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
            'establishmentname',
            'establishmentname',
            'address',
            'expedient',
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
        ],
    ]) ?>

    <hr/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'checkedby',
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