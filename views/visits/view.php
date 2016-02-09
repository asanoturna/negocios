<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "Detalhes da visita #" . $model->id;
?>
<div class="visits-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <p class="pull-right">
                    <?= Html::a('<span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Enviar Fotos', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Tem certeza que deseja excluir?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
        </div>
    
    </div>

    <div class="row container-fluid">
    <div class="panel panel-primary">
    <div class="panel-heading"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <strong>Informações da Visita</strong></div>
    <div class="panel-body">
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 
                        'label' => 'Data',
                        'format' => 'raw',
                        'value' => date("d/m/Y",  strtotime($model->date))
                    ],
                    'company_person',
                    'responsible',
                    
                    'contact',
                    'email:email',
                    'phone',
                    [ 
                        'label' => 'Valor',
                        'format' => 'raw',
                        'value' => "R$ ".$model->value,
                    ],   
                ],
            ]) ?>
        </div>
        <div class="col-md-6">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [ 
                    [ 
                    'label' => 'Usuário',
                    'format' => 'raw',
                    'value' => $model->user->username,
                    ],  
                    'location.fullname',                     
                    'visitsFinality.name',
                    'person.name', 
                    'num_proposal',
                    'attachment',
                    'visitsStatus.name',                    
                ],
            ]) ?>
        </div>
    </div>
    </div>
    </div>

    <div class="row container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> <strong>Parecer do Gerente</strong></div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 
                    'attribute' => 'observation',
                    //'label' => '',
                    'format' => 'html',
                    ],
                ],
            ]) ?>
          </div>
        </div>
    </div> 

    <div class="row container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span> <strong>Imagens da Visita</strong></div>
          <div class="panel-body">
            (imagens)
          </div>
        </div>
    </div>

    <div class="row container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> <strong>Mapa da Localização</strong></div>
          <div class="panel-body">
            (mapa aqui)
          </div>
        </div>
    </div>  

    <div class="row container-fluid">
        <div class="panel panel-primary">
          <div class="panel-heading"><span class="glyphicon glyphicon-hdd" aria-hidden="true"></span> <strong>Informações do Sistema</strong></div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 
                        'attribute' => 'id',
                        'label' => 'ID (Número da visita)',
                        'format' => 'raw',
                        'value' => $model->id,
                    ],  
                    [ 
                        'attribute' => 'created',
                        'format' => 'raw',
                        'value' => date("d/m/Y",  strtotime($model->created))
                    ],           
                    [ 
                        'attribute' => 'updated',
                        'format' => 'raw',
                        'value' => date("d/m/Y",  strtotime($model->updated))
                    ],  
                    [ 
                        'attribute' => 'ip',
                        'label' => 'IP (Terminal de origem)',
                        'format' => 'raw',
                        'value' => $model->ip,
                    ],
                ],
            ]) ?>
          </div>
        </div>
    </div>  



</div>
