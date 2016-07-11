<?php
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\DetailView;

$this->title = 'Minhas Informações';
?>
<div class="site-profile">

    <div class="row">
    <div class="col-sm-2">
    <?php  echo $this->render('//site/_menu'); ?>
    </div>

    <div class="col-sm-10">
    <h1><?= Html::encode($this->title) ?></h1>
    <hr style="color: #fff;background-color: #fff;"/>

    <div class="panel panel-default">
      	<div class="panel-body">    

		<?php echo DetailView::widget([
	        'model' => $userModel,
	        'attributes' => [
                [
                'attribute'=>'avatar',
                'value' => Yii::$app->params['usersAvatars'].$userModel->avatar,
                'format' => ['image',['width'=>'100','height'=>'200', 'class'=>'img-thumbnail']],
                ],   
                'username',
                'fullname', 
                'email:email',
                'location.fullname',
                'department.name',
                'phone',
                'celphone',
                'birthdate',
                [ 
                'attribute' => 'status', 
                'format' => 'raw',
                'value' => $userModel->status == 1 ? '<b style="color:#6CAF3F">Ativo</b>' : '<b style="color:#d43f3a">Inativo</b>',
                ],                      
                //'updated_at:datetime',                   
                //'created_at:datetime',
	        ],
		]); ?>

		</div>
	</div>
  
    </div>
    </div>
</div>
