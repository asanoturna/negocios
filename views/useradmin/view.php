<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Detalhes do Usuário #' . $model->id;
?>
<div class="useradmin-view">

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

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja realmente excluir?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Informações do Usuário</div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'username',
                    'fullname', 
                    'email:email',
                    'location_id',
                    'department_id',
                    'status',
                    //'avatar',
                    'phone',
                    'celphone',
                    'birthdate',
                    'updated_at',
                    'created_at',
                ],
            ]) ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">Permissões de Acesso</div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'can_admin',
                    'can_visits',
                    'can_productivity',
                    'can_requestresources',
                    'can_managervisits',
                    'can_managerproductivity',
                    'can_managerrequestresources',
                ],
            ]) ?>
          </div>
        </div>
      </div>

    </div>    

    </div>
    </div>
</div>
