<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = "Detalhes do Usuário #" . $user->id;
?>
<div class="user-view">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('//site/_menuadmin'); ?>
    </div>

    <div class="col-sm-10">
<div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Lista de Usuários', ['index'], ['class' => 'btn btn-success']) ?>
      </span></div>
    </div>
    <hr/>

    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar', ['update', 'id' => $user->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir', ['delete', 'id' => $user->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Confirma exclusão?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $user,
        'attributes' => [
            'id',
            'role_id',
            'status',
            'email:email',
            'username',
            'profile.full_name',
            'password',
            'auth_key',
            'access_token',
            'logged_in_ip',
            'logged_in_at',
            'created_ip',
            'created_at',
            'updated_at',
            'banned_at',
            'banned_reason',
        ],
    ]) ?>

</div>
    </div>
    </div>