<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Recuperar Senha';
?>
<div class="user-default-forgot">

    <h2><?= Html::encode($this->title) ?></h2>
    <hr/>

	<?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'forgot-form']); ?>
                    <?= $form->field($model, 'email') ?>
                    <p>
                        <em><strong>Atenção:</strong> Você receberá instruções de recuperação de senha no seu e-mail</em>
                    </p>
                    <div class="form-group">
                        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

	<?php endif; ?>

</div>
