<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_menu'); ?>
    <hr/>

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
                'value' => $model->daily_productivity_status_id === 1 ? "<span class=\"label label-warning\">".$model->dailyProductivityStatus->name."</span>" : "<span class=\"label label-success\">".$model->dailyProductivityStatus->name."</span>",
            ],                  
            [ 
                'label' => 'Data',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],           
            'location.fullname',  
            'product.name',                          
            'value',
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
