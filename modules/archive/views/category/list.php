<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\SqlDataProvider;

$this->title = 'Categorias';
?>
<div class="category-index">

  <div class="row">
    <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
    <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('/file/_menu'); ?></span></div>
  </div>
  <hr/>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">

    <div class="panel panel-default">
    <div class="panel-body"> 

      <?php
      $dataProvider2 = new SqlDataProvider([
          'sql' => "SELECT mod_archive_category.name as catname, COUNT(attachment) as catcount FROM mod_archive_file
INNER JOIN mod_archive_category
ON mod_archive_file.archive_category_id = mod_archive_category.id
GROUP by catname",
          'totalCount' => 100,
          'sort' =>false,
          'key'  => 'catname',
          'pagination' => [
              'pageSize' => 100,
          ],
      ]);
      ?>
      <div class="list-group">
      <?php
      $prov = $models = $dataProvider2->getModels();
      if(!empty($prov))
          {
              foreach($prov as $row)
              {
                  //echo "<i class=\"fa fa-tag\" aria-hidden=\"true\" style=\"color:".$row["color"]."\"></i> ". $row["name"] ."<br/>";
                echo "<a href=\"#\" class=\"list-group-item\"><span class=\"badge\">".$row["catcount"]."</span>".$row["catname"]."</a>";
              }   
          } else {
              echo "<span class=\"not-set\">(nenhum departamento encontrado)</span>";
          }                
      ?>
      </div>
    </div>
    </div>

    </div>
    <div class="col-md-4"></div>
  </div>

</div>
