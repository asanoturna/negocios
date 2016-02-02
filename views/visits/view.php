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

    <p class="pull-right">
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Tem certeza que deseja excluir?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
            'responsible',
            'company_person',
            'contact',
            'email:email',
            'phone',
            [ 
                'label' => 'Valor',
                'format' => 'raw',
                'value' => "R$ ".$model->value,
            ],   
            'num_proposal',
            'observation:html',              
            'created',
            'updated',
            'ip',
            'attachment',
            'localization_map',
            'visits_finality_id',
            'visits_status_id',
            'person.name', 
            'location.fullname', 
            'user_id',
        ],
    ]) ?>

</div>
