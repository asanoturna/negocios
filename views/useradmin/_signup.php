<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Location;
use app\models\Department;
use yii\widgets\MaskedInput;

?>

<div class="useradmin-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> Informações do Usuário</div>
          <div class="panel-body">
            <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>            

            <hr/>

            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'celphone')->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => ['(99)99999-9999'],
            ]) ?>            

            <?= $form->field($model, 'birthdate')->textInput() ?>

            <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("fullname ASC")->all(), 'id', 'fullname'),['prompt'=>'--'])  ?> 

            <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Department::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?> 

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-key" aria-hidden="true"></i> Permissões de Acesso</div>
          <div class="panel-body">

            <?= $form->field($model, 'can_admin')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_visits')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_productivity')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_requestresources')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_managervisits')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_managerproductivity')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

            <?= $form->field($model, 'can_managerrequestresources')->radioList([
                '1' => 'Sim', 
                '0' => 'Não',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>

          </div>
        </div>
      </div>

    </div>      

    <hr/>
    <div class="form-group">
        <?= Html::submitButton('Gravar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>