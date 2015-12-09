<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = 'Informações do Usuário';
?>
<div class="user-default-profile">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?> 

    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>

    <div class="col-sm-4 col-md-2">
        <img src="images/users/<?php echo Yii::$app->user->identity->profile->avatar;?>" alt="" class="img-rounded img-responsive img-thumbnail" />
    <?php 
    Modal::begin([
        'header' => '<h2>Alterar Imagem</h2>',
        'toggleButton' => ['label' => 'Alterar', 'class' => 'btn btn-success btn-sm btn-block'],
    ]);
    echo "<small>Para alterar sua imagem envie o arquivo para ".Yii::$app->params['supportDep']."</small>";
    Modal::end();
    ?> 
    </div>
    <?php // echo $form->field($profile, 'full_name')->textInput(['readonly' => true]) ?>
    <address>
      <strong>Nome: </strong><?php echo Yii::$app->user->identity->profile->full_name;?><br>
      <strong>Usuário: </strong><a href="mailto:#"><?php echo Yii::$app->user->displayName;?></a><br>
      <strong>E-mail: </strong><br>
      <strong>Ramal: </strong><br>
      <strong>Setor/Departamento: </strong><br>
    </address>

    <!--     
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton('Gravar', ['class' => 'btn btn-success']) ?>
        </div>
    </div> 
    -->

    <?php ActiveForm::end(); ?>

</div>