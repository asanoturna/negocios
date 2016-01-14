<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [ 
                'label' => 'Receita da Cooperativa',
                'format' => 'raw',
                'value' => "<strong>R$ ".$model->companys_revenue."</strong>"
            ],            
            [ 
                'label' => 'Situação',
                'format' => 'raw',
                //'value' => $model->dailyProductivityStatus->name,
                'value' => $model->daily_productivity_status_id === 0 ? "<span class=\"label label-warning\">".$model->dailyProductivityStatus->name."</span>" : "<span class=\"label label-success\">".$model->dailyProductivityStatus->name."</span>",
            ],                  
            [ 
                'label' => 'Data',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],           
            'location.fullname',  
            'product.name',                          
            'value',
            'quantity',
            'commission_percent',
            'person.name', 
            'buyer_document',             
            'buyer_name',                     
            [ 
                'label' => 'Indicador',
                'format' => 'raw',
                'value' => $model->seller->username,
            ],             
            [ 
                'label' => 'Angariador',
                'format' => 'raw',
                'value' => $model->operator->username,
            ],     
            [ 
                'label' => 'Usuário',
                'format' => 'raw',
                'value' => $model->user->username,
            ],                        
        ],
    ]) ?>

</div>
