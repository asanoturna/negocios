<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
?>
<div class="todolist-view">

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
                'confirm' => 'Confirma a exclusão do registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="panel panel-default">
    <div class="panel-body"> 

    <div class="row">
      <div class="col-md-6">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'department.name',
            'category.name',
            [
                'attribute' => 'deadline',
                'value' => date("d/m/Y",  strtotime($model->deadline))
            ],
            'priority.name',
            [
           'attribute'=>'attachment',
           'format' => 'raw',
           'value' => $model->attachment == null ? "<span class=\"not-set\">(sem anexo)</span>" : '<span class="glyphicon glyphicon-paperclip"></span> '.Html::a('Visualizar Anexo', Yii::$app->params['uploadPath'].$model->attachment, ['target' => '_blank']),
            ], 
            [ 
            'attribute' => 'owner_id',
            'format' => 'raw',
            'value' => $model->owner->fullname,
            ], 
            [
                'attribute' => 'created',
                'value' => date("d/m/Y",  strtotime($model->created))
            ],
            [ 
            'attribute' => 'responsible_id',
            'format' => 'raw',
            'value' => $model->responsible->fullname,
            ], 
            [
                'attribute' => 'updated',
                'value' => date("d/m/Y",  strtotime($model->updated))
            ],
            [ 
            'label' => 'Situação',
            'format' => 'raw',
            'value' => "<span class=\"label label-default\">".$model->status->name."</span>",
            ],
        ],
    ]) ?>

      </div>
      <div class="col-md-6">

    <div class="panel panel-default">
      <div class="panel-heading"><b>Descrição da Atividade</b></div>
      <div class="panel-body">
        <?= $model->description == null ? "<span class=\"not-set\">(não informado)</span>" : $model->description ?>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading"><b>Observação do Responsável</b></div>
      <div class="panel-body">
        <?= $model->responsible_note == null ? "<span class=\"not-set\">(não informado)</span>" : $model->responsible_note ?>
      </div>
    </div>

      </div>
    </div>

    </div>
    </div>

</div>
