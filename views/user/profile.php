<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;

$this->title = 'Informações do Usuário';
?>
<div class="user-default-profile">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

<div class="row">
  <div class="col-md-4">

    <div class="col-md-5">
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

    <dl>
      <dt>Nome: </dt>
      <dd><?php echo Yii::$app->user->identity->profile->full_name;?></dd>
      <dt>E-mail: </dt>
      <dd><a href="mailto:<?php echo Yii::$app->user->identity->email;?>"><?php echo Yii::$app->user->identity->email;?></a></dd>      
      <dt>Usuário: </dt>
      <dd><?php echo Yii::$app->user->displayName;?></dd>                 
    </dl>

  </div>
  <div class="col-md-4">


  </div>
  <div class="col-md-4">
      

  </div>
</div>

</div>