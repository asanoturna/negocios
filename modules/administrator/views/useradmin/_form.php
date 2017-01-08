<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\administrator\models\Location;
use app\modules\administrator\models\Department;
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

            <?php // $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'status')->radioList([
                '1' => 'Ativo', 
                '0' => 'Inativo',
                ], ['itemOptions' => ['labelOptions'=>array('style'=>'padding:5px;')]]) ?>            

            <hr/>

            <div class="row">
              <div class="col-md-3">
              <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
              </div>
              <div class="col-md-3">
              <?= $form->field($model, 'celphone')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => ['(99)99999-9999'],
            ]) ?> 
            </div>
            <div class="col-md-3"><?= $form->field($model, 'birthdate')->textInput() ?></div>
            </div>            


            <div class="row">
              <div class="col-md-5">
              <?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("fullname ASC")->all(), 'id', 'fullname'),['prompt'=>'--'])  ?> 
              </div>
              <div class="col-md-5">
              <?= $form->field($model, 'department_id')->dropDownList(ArrayHelper::map(Department::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?>
              </div>
            </div>

            

            

          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fa fa-shield" aria-hidden="true"></i> Permissões de Acesso</div>
          <div class="panel-body">

            <?= $form->field($model, 'can_admin')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?>     

            <?= $form->field($model, 'can_visits')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?> 

            <?= $form->field($model, 'can_productivity')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?>            

            <?= $form->field($model, 'can_requestresources')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?>   

            <?= $form->field($model, 'can_managervisits')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?>   

            <?= $form->field($model, 'can_managerproductivity')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?>   

            <?= $form->field($model, 'can_managerrequestresources')->checkbox(['uncheck' =>  0, 'checked' => 1]); ?> 

          </div>
        </div>
      </div>

    </div>      

    <hr/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
