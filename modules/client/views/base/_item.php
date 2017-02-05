<?php
use yii\helpers\Html;
?>  

<div class="row">
  <div class="col-md-6">

<ul class="list-group">
  	<li class="list-group-item"><strong>Associado:</strong> <?=$model->name;?></li>
  	<li class="list-group-item"><strong>CPF/CNPJ:</strong> <?=$model->doc;?></li>
</ul>

  </div>
  <div class="col-md-6">

<ul class="list-group">
	<li class="list-group-item"><strong>Conta:</strong> <?=$model->account;?> </li>
  	<li class="list-group-item"><strong>Pedra:</strong> <?=$model->Category;?> </li>
</ul>

  </div>
</div>
