<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\DetailView;

$this->title = 'Alterar Senha';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>         
            <div class="panel panel-default">
                <div class="panel-heading"><h4 class="text-center login-title">Alterar Senha</h4></div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(); ?>
                    <?php echo $form->field($resetPasswordForm, 'password')->passwordInput(); ?>
                    <?php echo $form->field($resetPasswordForm, 'confirmPassword')->passwordInput(); ?>
                    <div class="form-group">
                        <?php echo Html::resetButton('Cancelar', ['class' => 'btn btn-default']) ?>
                        <?php echo Html::submitButton('Alterar', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>