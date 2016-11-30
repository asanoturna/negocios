<?php
use yii\helpers\Html;

$this->title = "Calendário de Atividades";
?>
<div class="site-error">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

    <div class="panel panel-default">
    <div class="panel-body"> 

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
          'events'=> $events,
        ));
    ?>

    <?php
    //var_dump($events);
    ?>

    </div>
    </div>

</div>
