<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	  <div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">Informações do Produto</div>
		  <div class="panel-body">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>
		  </div>
		</div>
	  </div>
	  <div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading">Parâmetros</div>
		  <div class="panel-body">
    <?= $form->field($model, 'min_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'max_value')->textInput(['maxlength' => true]) ?>
		  </div>
		</div>
	  </div>
	</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
