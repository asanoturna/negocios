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
          <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> Informações do Usuário</div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [  
                    [
                    'attribute'=>'avatar',
                    'value' => Yii::$app->params['usersAvatars'].$model->avatar,
                    'format' => ['image',['width'=>'100','height'=>'200', 'class'=>'img-thumbnail']],
                    ],                                
                    'username',
                    'fullname', 
                    'email:email',
                    'location.fullname',
                    'department.name',
                    'phone',
                    'celphone',
                    'birthdate',
                    [ 
                    'attribute' => 'status', 
                    'format' => 'raw',
                    'value' => $model->status == 1 ? '<b style="color:#6CAF3F">Ativo</b>' : '<b style="color:#d43f3a">Inativo</b>',
                    ],                      
                    'updated_at:datetime',                   
                    'created_at:datetime',
                ],
            ]) ?>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-shield" aria-hidden="true"></i> Permissões de Acesso</div>
          <div class="panel-body">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [ 
                    'attribute' => 'can_admin', 
                    'format' => 'raw',
                    'value' => $model->can_admin == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],      
                    [ 
                    'attribute' => 'can_visits', 
                    'format' => 'raw',
                    'value' => $model->can_visits == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],  
                    [ 
                    'attribute' => 'can_productivity', 
                    'format' => 'raw',
                    'value' => $model->can_productivity == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],    
                    [ 
                    'attribute' => 'can_requestresources', 
                    'format' => 'raw',
                    'value' => $model->can_requestresources == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],      
                    [ 
                    'attribute' => 'can_managervisits', 
                    'format' => 'raw',
                    'value' => $model->can_managervisits == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],  
                    [ 
                    'attribute' => 'can_managerproductivity', 
                    'format' => 'raw',
                    'value' => $model->can_managerproductivity == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],
                    [ 
                    'attribute' => 'can_managerrequestresources', 
                    'format' => 'raw',
                    'value' => $model->can_managerrequestresources == 1 ? '<b style="color:#6CAF3F">Sim</b>' : '<b style="color:#d43f3a">Não</b>',
                    ],                                                                  
                ],
            ]) ?>
          </div>
        </div>
      </div>

    </div>    

    </div>
    </div>
</div>
