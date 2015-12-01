<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;

$this->title = 'Alterar Senha';
?>
<div class="user-default-account">
    <h2>
        <span><?= Html::encode($this->title) ?></span>
    </h2>
    <hr/>
    <!-- Alerts -->
    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <?php $form = ActiveForm::begin([
        'id' => 'account-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>
    <?php if ($user->scenario == 'account'):?>
        <?= $form->field($user, 'currentPassword')->passwordInput() ?>
        <hr/>
    <?php endif; ?>

    <?= $form->field($user, 'newPassword')->passwordInput() ?>

    <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>