<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\campaign\models\Sipag;

?>

<div class="row">
<div class="col-md-6">
  <div class="panel panel-default">
  <div class="panel-heading"><b>Pesquisar</b></div>
    <div class="panel-body" style="height: 140px;max-height: 140;">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'establishmenttype')->dropDownList(Sipag::$Static_establishmenttype,['prompt'=>'TODOS', 'onchange' => '
        if($(this).val() == 1) {
        $("#'.Html::getInputId($model, 'tax').'").val($(this).val());
        }
        else if($(this).val() == 2) {
        $("#'.Html::getInputId($model, 'tax').'").val($(this).val());
        } else if($(this).val() == 3){
        $("#'.Html::getInputId($model, 'tax').'").val($(this).val());
        }'
        ]) ?>

     <div class="box col-lg-4">
        
    </div>        

    <div class="form-group">
        <?= Html::submitButton('Filtrar', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
  </div>
</div> 
<!-- <div class="col-md-6">
  <div class="panel panel-default">
  <div class="panel-heading"><b>Taxas</b></div>
    <div class="panel-body" style="height: 140px;max-height: 140;">
      
    </div>
  </div>
</div>  -->    
</div>