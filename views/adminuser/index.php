<?php

use yii\helpers\Html;
use yii\grid\GridView;

$module = $this->context->module;
$user = $module->model("User");
$role = $module->model("Role");

$this->title = 'Gestão de Usuários';
?>
<div class="user-index">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('//site/_menuadmin'); ?>
    </div>

    <div class="col-sm-10">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Usuário', ['create'], ['class' => 'btn btn-success']) ?>
      </span></div>
    </div>
    <hr/>

    <?php \yii\widgets\Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
            'attribute' => 'id',
            'label' => 'ID',
            'enableSorting' => true,
            'contentOptions'=>['style'=>'width: 4%;text-align:center'],
            ],
            // [
            // 'attribute' => 'avatar',
            // 'header' => '',
            // 'format' => 'html',
            // 'value' => function ($model) {
            //     return Html::img(Yii::$app->request->BaseUrl.'/images/users/'.$model->profile->avatar,
            //         ['width' => '50px', 'class' => 'img-rounded img-responsive']);
            // },
            // 'contentOptions'=>['style'=>'width: 6%;text-align:middle'],                    
            // ],  
            'username',               
            'profile.full_name',
            'email:email',
            [
            'attribute' => 'role_id',
            'label' => 'Perfil de Acesso',
            'filter' => $role::dropdown(),
            'value' => function($model, $index, $dataColumn) use ($role) {
                $roleDropdown = $role::dropdown();
                return $roleDropdown[$model->role_id];
            },
            'contentOptions'=>['style'=>'width: 10%;text-align:center'], 
            ],
            [
            'attribute' => 'status',
            'label' => 'Situação',
            'filter' => $user::statusDropdown(),
            'value' => function($model, $index, $dataColumn) use ($user) {
                $statusDropdown = $user::statusDropdown();
                return $statusDropdown[$model->status];
            },
            'contentOptions'=>['style'=>'width: 8%;text-align:center'], 
            ],
            [
              'class' => 'yii\grid\ActionColumn',
              'header' => 'Ações',  
              'contentOptions'=>['style'=>'width: 10%;text-align:right'],
              'headerOptions' => ['class' => 'text-center'],                            
              'template' => '{avatar} {view} {update} {delete}',
              'buttons' => [
                  'avatar' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-camera" ></span>', $url, [
                                  'title' => 'Alterar Foto',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },              
                  'view' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-list-alt" ></span>', $url, [
                                  'title' => 'Detalhes',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },                                                
                  'update' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-pencil" ></span>', $url, [
                                  'title' => 'Alterar',
                                  'class' => 'btn btn-default btn-xs',
                      ]);
                  },
                  'delete' => function ($url, $model) {
                      return Html::a('<span class="glyphicon glyphicon-trash" ></span>', $url, [
                                  'title' => 'Excluir',
                                  'class' => 'btn btn-default btn-xs',
                                  'data-confirm' => 'Tem certeza que deseja excluir?',
                                  'data-method' => 'post',
                                  'data-pjax' => '0',
                      ]);
                  },                                    
                ],
            ],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>
    </div>
  </div>
</div>