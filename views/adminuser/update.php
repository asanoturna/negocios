<?php

use yii\helpers\Html;


$this->title = 'Alterar Usuário #' . $user->id;
?>
<div class="user-update">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;">
        <?= Html::a('<span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Lista de Usuários', ['index'], ['class' => 'btn btn-success']) ?>
      </span></div>
    </div>
    <hr/>

    <?= $this->render('_form', [
        'user' => $user,
        'profile' => $profile,
    ]) ?>

</div>
