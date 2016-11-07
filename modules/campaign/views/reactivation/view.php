<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Reativação de Associados';
?>
<div class="capitalaction-view">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Informações do Sistema</h3>
    </div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
        'attributes' => [
            'id',
            [ 
                'label' => 'PA',
                'format' => 'raw',
                'value' => $model->location->fullname,
            ],  
            'client_name',
            'client_doc',
            'client_risk',
            [
                'attribute' => 'client_last_renovated_register',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->client_last_renovated_register))
            ],
            'client_income',
            [ 
                'label' => 'Gerente',
                'format' => 'raw',
                'value' => $model->user->username,
            ],  
        ],
    ]) ?>
    </div>
    </div>

    <div class="panel panel-info">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Informações Gerenciadas pelos Gerentes</h3>

    <?php
        if (Yii::$app->user->id <> 51){ ?>
        <div class="btn-group pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </p></div>
    <?php } ;?>

    </div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
        'attributes' => [
            'restrictions_serasa',
            'restrictions_ccf',
            'restrictions_scr',
            'agent_visit_number',
            'agent_registration_renewal',
            'agent_overdraft_value',
            'agent_card_value',
        ],
    ]) ?>
    </div>
    </div>

    <div class="panel panel-warning">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Informações Gerenciadas pela Fabrícia</h3>

    <?php
    if (Yii::$app->user->id === 51){ ?>
        <div class="btn-group pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['supervisor', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </p></div>
    <?php }else{ ;?>
        <div class="btn-group pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Alterar', ['#', 'id' => $model->id], ['class' => 'btn btn-default','disabled' => 'disabled']) ?>
            </p></div>
    <?php };?>
    </div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
        'attributes' => [
            'supervisor_package_rate', 
        ],
    ]) ?>
    </div>
    </div>

    <div class="panel panel-success">
    <div class="panel-heading clearfix">
    <h3 class="panel-title pull-left" style="padding-top: 7.5px;">Informações Supervisionadas pelo Claúdio</h3>

<?php
    if (Yii::$app->user->id === 17){ ?>
        <div class="btn-group pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['manager', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
            </p></div>
    <?php }else{ ;?>
        <div class="btn-group pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Alterar', ['#', 'id' => $model->id], ['class' => 'btn btn-default','disabled' => 'disabled']) ?>
            </p></div>
    <?php };?>

    </div>
    <div class="panel-body">
    <?= DetailView::widget([
        'model' => $model,
        'formatter' => ['class' => 'yii\i18n\Formatter','nullDisplay' => '<span class="not-set">(não informado)</span>'],
        'attributes' => [
            'manager_inactive_meeting',
            'manager_approval', 
        ],
    ]) ?>
    </div>
    </div>

</div>