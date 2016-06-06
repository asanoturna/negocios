<?php

use yii\helpers\Html;
use yii\grid\GridView;

$module = $this->context->module;
$user = $module->model("User");
$role = $module->model("Role");

$this->title = 'Lista de Usuários';
?>
<div class="user-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
        <?= Html::a('<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Usuário', ['create'], ['class' => 'btn btn-success']) ?>
      </span></div>
    </div>
    <hr/>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'profile.full_name',
            'email:email',
            [
            'attribute' => 'role_id',
            'label' => 'Perfil',
            'filter' => $role::dropdown(),
            'value' => function($model, $index, $dataColumn) use ($role) {
                $roleDropdown = $role::dropdown();
                return $roleDropdown[$model->role_id];
            },
            ],
            [
            'attribute' => 'status',
            'label' => 'Situação',
            'filter' => $user::statusDropdown(),
            'value' => function($model, $index, $dataColumn) use ($user) {
                $statusDropdown = $user::statusDropdown();
                return $statusDropdown[$model->status];
            },
            ],
            // 'username',
            // 'password',
            // 'auth_key',
            // 'access_token',
            // 'logged_in_ip',
            // 'logged_in_at',
            // 'created_ip',
            // 'updated_at',
            // 'banned_at',
            // 'banned_reason',
            ['class' => 'yii\grid\ActionColumn',
            'header' => 'Opções',],
        ],
    ]); ?>
    <?php \yii\widgets\Pjax::end(); ?>

</div>
