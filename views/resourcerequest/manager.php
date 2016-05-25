<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Resourcestatus;


$this->title = 'Gerenciar Solicitação: ' . ' ' . $model->id;
?>
<div class="resourcerequest-manager">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_manager'); ?></span></div>
    </div>
    <hr/>

	<?php $form = ActiveForm::begin(); ?>

<div class="panel panel-default">
    <div class="panel-heading">Informações Auxiliares</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4"><?= $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(Location::find()->where(['is_active' => 1])->orderBy("shortname ASC")->all(), 'id', 'shortname'),['prompt'=>'--'])  ?> </div>
          <div class="col-md-4"><?= $form->field($model, 'resource_type')->dropDownList(Resourcerequest::$Static_resource_type,['prompt'=>'--']) ?></div>
          <div class="col-md-4"><?= $form->field($model, 'resource_purposes')->dropDownList(Resourcerequest::$Static_resource_purposes,['prompt'=>'--']) ?></div>
        </div>
        <div class="row">
          <div class="col-md-4"><?= $form->field($model, 'has_transfer')->dropDownList(Resourcerequest::$Static_has_transfer,['prompt'=>'--']) ?></div>
          <div class="col-md-4"><?= $form->field($model, 'receive_credit')->dropDownList(Resourcerequest::$Static_receive_credit,['prompt'=>'--']) ?></div>
          <div class="col-md-4"><?= $form->field($model, 'add_insurance')->dropDownList(Resourcerequest::$Static_add_insurance,['prompt'=>'--']) ?></div>
        </div>
      </div>
    </div>   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>	

</div>
