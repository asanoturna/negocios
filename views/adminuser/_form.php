<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\SqlDataProvider;
use yii\grid\GridView;

$module = $this->context->module;
$role = $module->model("Role");
?>

<div class="row">

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Informações do Usuário</div>
        <div class="panel-body">
            <div class="user-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($user, 'username')->textInput(['maxlength' => 255]) ?>

            <?= $form->field($user, 'newPassword')->passwordInput() ?>

            <?= $form->field($profile, 'full_name'); ?>

            

            <?= $form->field($user, 'status')->dropDownList($user::statusDropdown()); ?>

            <div class="form-group">
                <?= Html::submitButton($user->isNewRecord ? '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Gravar' : '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Gravar', ['class' => $user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            </div>
        </div>
        </div>  
</div> 

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">Permissões</div>
        <div class="panel-body">
        <?= $form->field($user, 'role_id')->dropDownList($role::dropdown(),['prompt'=>'--'])->label('Perfil de Acesso'); ?>
        <hr/>
        <?php
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT 
                    name,
                    can_admin,
                    can_productmanager,
                    can_business_visits
                    FROM role',
        ]);
        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyText'    => '</br><p class="text-danger">Nenhuma informação encontrada</p>',
            'summary'      =>  '',
            'showHeader'   => true,        
            'tableOptions' => ['class'=>'table table-striped table-hover '],            
            'columns' => [
            [
            'attribute' => 'name',
            'label' => 'Descrição',
            ],                
            [
            'attribute' => 'can_admin',
            'label' => 'Gerenciar Sistema?',
            'format' => 'raw',
            'value' => function ($data) {                      
                    return $data["can_admin"] == 1 ? '<b style="color:green">Sim</b>' : '<b style="color:gray">Não</b>';
                    },            
            ], 
            [
            'attribute' => 'can_productmanager',
            'label' => 'Gerenciar Produtos?',
            'format' => 'raw',
            'value' => function ($data) {                      
                    return $data["can_productmanager"] == 1 ? '<b style="color:green">Sim</b>' : '<b style="color:gray">Não</b>';
                    },              
            ], 
            [
            'attribute' => 'can_business_visits',
            'label' => 'Adicionar Visitas?',
            'format' => 'raw',
            'value' => function ($data) {                      
                    return $data["can_business_visits"] == 1 ? '<b style="color:green">Sim</b>' : '<b style="color:gray">Não</b>';
                    },              
            ],                                         
            ],
        ]); ?>        
        </div>
    </div>
</div>

</div>