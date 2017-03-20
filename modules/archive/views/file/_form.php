<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\archive\models\Category;

?>

<div class="file-form">

    <?php $form = ActiveForm::begin([
                'options' => ['enctype'=>'multipart/form-data']
        ]); ?>

<div class="row">
  <div class="col-md-6">

    <?= $form->field($model, 'archive_category_id')->dropDownList(ArrayHelper::map(Category::find()->where(['is_active' => 1])->orderBy("name ASC")->all(), 'id', 'name'),['prompt'=>'--'])  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput()->hint('Formatos: zip, jpg, jpeg, png, pdf, doc, docx, xls, xlsx, ppt, pps, pptx') ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

  </div>
  <div class="col-md-6">

    <?= $form->field($model, 'description')->textarea(['rows' => 7]) ?>

    <?= $form->field($model, 'is_active')->dropDownList([
        '1' => 'Sim', 
        '0' => 'Não',
        ]) ?>

  </div>
</div>

<?php ActiveForm::end(); ?>

</div>
