<?php

$this->title = Yii::$app->params['appname'];
?>
<div class="site-index">

    <div class="row">
    
    <div class="col-sm-3">
    <div class="panel panel-default">
	  <div class="panel-heading"><b>Módulos</b></div>
	  <div class="panel-body">
	    <?php  echo $this->render('_menu'); ?>
	  </div>
	</div>
    </div>
    <div class="col-sm-9">
      <div class="panel panel-default">
      <div class="panel-heading"><b>Visão Geral</b></div>
      <div class="panel-body">
        
      </div>
    </div>
    </div>

    </div>
</div>
