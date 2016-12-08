<?php
use yii\helpers\Html;
use yii\web\JsExpression;
use yii\data\SqlDataProvider;

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

<div class="row">
  <div class="col-md-2">

  <div class="panel panel-default">
    <div class="panel-heading">Legenda</div>
    <div class="panel-body">
      <?php
      $dataProvider = new SqlDataProvider([
          'sql' => "SELECT d.name as name, d.hexcolor as color FROM department d WHERE d.is_active = 1",
          'totalCount' => 100,
          'sort' =>false,
          'key'  => 'name',
          'pagination' => [
              'pageSize' => 100,
          ],
      ]);
      ?>
      <?php

          $prov = $models = $dataProvider->getModels();
          if(!empty($prov))
              {
                  foreach($prov as $row)
                  {
                      echo "<i class=\"fa fa-tag\" aria-hidden=\"true\" style=\"color:".$row["color"]."\"></i> ". $row["name"] ."<br/>";
                  }   
              } else {
                  echo "<span class=\"not-set\">(nenhum departamento encontrado)</span>";
              }                
      ?>
    </div>
  </div>

  </div>
  <div class="col-md-10">

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
    </div>

</div>
