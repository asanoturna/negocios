<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="visitsimages-form">

	<div class="row">
	  <div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

	<?php
    $t = Yii::$app->getRequest()->getQueryParam('id');
    ?>

    <?= Html::activeHiddenInput($model, 'business_visits_id', ['value' => $t]) ?>    

    <?= $form->field($model, 'name')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Enviar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	  </div>
	  <div class="col-md-6">
		<div class="panel panel-default">
		  <div class="panel-heading"><strong>Informações</strong></div>
		  <div class="panel-body">
		    Você pode adicionar até 5 imagens no seu registro de visita.
		  </div>
		</div>
	  </div>
	</div>



</div>
