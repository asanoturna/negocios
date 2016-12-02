<?php
use yii\helpers\Html;
use yii\web\JsExpression;

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

<?php
$JSDropEvent = <<<EOF
function(calEvent, jsEvent, view) {
window.location = 'http://localhost/negocios/web/index.php?r=task/todolist';

}
EOF;
?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
          'options' => [
            'lang' => 'pt',
          ],
          'events'=> $events,
          'clientOptions' => [
          'selectable' => true,
          'eventClick' => new JsExpression($JSDropEvent),
          ],
        ));
    ?>

    </div>
    </div>

</div>
