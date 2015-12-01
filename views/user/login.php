<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="user-default-login">
	<div class="container">
		<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
		<h1 class="text-center login-title">Autenticação</h1>
		<hr/>
		<div class="account-wall">
			<?php $form = ActiveForm::begin([
				'id' => 'login-form',
				'options' => ['class' => 'form-signin'],
			]); ?>

			<?= $form->field($model, 'username')->label('Usuário ou E-mail',['class'=>'label-class']) ?>
			<?= $form->field($model, 'password')->label('Senha',['class'=>'label-class'])->passwordInput() ?>
			<?php
			/*$form->field($model, 'rememberMe', [
				'template' => "{label}<div class=\"checkbox pull-left\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
			])->checkbox() */?>

					<?= Html::submitButton('Entrar', ['class' => 'btn btn-lg btn-success btn-block']) ?>
					</p>
		            <?= Html::a('Esqueceu sua senha' . "?", ["/user/forgot"], array('class' => 'text-center new-account')) ?>

			<?php ActiveForm::end(); ?>

		</div>
		</div>
		</div>
	</div> 
</div>