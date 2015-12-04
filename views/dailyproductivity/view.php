<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',  
            [ 
                'label' => 'Situação',
                'format' => 'raw',
                'value' => $model->dailyProductivityStatus->name,
            ],                  
            [ 
                'label' => 'Data',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->date))
            ],            
            'value',
            'commission_percent',
            'companys_revenue',
            'buyer_document',
            'buyer_name',
            'location.shortname',          
            'product.name',
            'person.name',           
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
