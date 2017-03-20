<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\archive\models\Category;

?>

<div class="file-form">

<div class="row">
  <div class="col-md-6">

    <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
        ]); ?>

    <?= $form->field($model, 'archive_category_id')->dropDownList(ArrayHelper::map(Category::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 9]) ?>

    <?= $form->field($model, 'is_active')->dropDownList([
        '1' => 'Sim', 
        '0' => 'Não',
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
  <div class="col-md-6">.col-md-6</div>
</div>



</div>
