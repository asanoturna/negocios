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
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'description',
                'format' => 'raw',
            ],
            'department_id',
            'category_id',
            'status_id',
            [
                'attribute' => 'deadline',
                'value' => date("d/m/Y",  strtotime($model->deadline))
            ],
            'priority',
            'owner_id',
            'responsible_id',
            'is_done',
            [
                'attribute' => 'created',
                'value' => date("d/m/Y",  strtotime($model->created))
            ],
            [
                'attribute' => 'updated',
                'value' => date("d/m/Y",  strtotime($model->updated))
            ],
        ],
    ]) ?>
    </div>
    </div>

</div>
