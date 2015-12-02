<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Produtividade Diária';
?>
<div class="dailyproductivity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
            'valor',
            'commission_percent',
            'companys_revenue',
            'buyer_document',
            'buyer_name',
            'location.shortname',          
            'product.name',
            'modality.name',
            'person.name',           
            [ 
                'label' => 'Vendedor',
                'format' => 'raw',
                'value' => $model->seller->username,
            ],             
            [ 
                'label' => 'Operador',
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
