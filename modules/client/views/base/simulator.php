<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use app\modules\client\models\Base;
use app\modules\client\models\Category;

$this->title = 'Cálculo de  Empréstimo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <div class="row">
      <div class="col-md-6"><h1><?= Html::encode($this->title) ?></h1></div>
      <div class="col-md-6"><span class="pull-right" style="top: 15px;position: relative;"><?php  echo $this->render('_menu'); ?></span></div>
    </div>
    <hr/>

<div class="row">

    <div class="col-xs-6 col-md-4">

    <div class="panel panel-default">
        <div class="panel-body"> 
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>

    </div>
    <div class="col-xs-12 col-sm-6 col-md-8">
      <div class="panel panel-default">
      <div class="panel-body">

        <?= 
        ListView::widget([
            'dataProvider' => $dataProvider1,
            'itemView' => '_item',
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => "{items}",
        ]);
        ?>

        <?php if ($dataProvider1->totalCount > 0) {
        $account = Yii::$app->request->queryParams['BaseSearch']["account"];
        $category_id = Yii::$app->request->queryParams['BaseSearch']["category_id"];
        $value = Yii::$app->request->queryParams['BaseSearch']["value"];
        $quota = Yii::$app->request->queryParams['BaseSearch']["quota"];
        $date = Yii::$app->request->queryParams['BaseSearch']["date"];
        

        $connection = Yii::$app->getDb();
        $command_client = $connection->createCommand("
            SELECT category_id
            FROM mod_client_base
            WHERE account = $account");

        $result_client = $command_client->queryScalar();

        switch ($result_client) {
            case 0:
                $column = "rate_diamante";
                break;
            case 1:
                $column = "rate_esmeralda";
                break;
            case 2:
                $column = "rate_rubi";
                break;
            case 3:
                $column = "rate_safira";
                break;
            case 4:
                $column = "rate_topazio";
                break;
        }

        $command_client_rate = $connection->createCommand("
            SELECT $column 
            FROM mod_client_category
            WHERE id = $category_id");

        $resultclient_rate = $command_client_rate->queryScalar();

        $taxa = $resultclient_rate;
        $juros = $value * $taxa;
        $price = $quota/$juros;
        $prestacao = $quota/$juros;
        $valorfinal = $price*$quota;
        $jurospago = $valorfinal - $value;

        ?>

        <div class="row">
          <div class="col-md-6">

        <ul class="list-group">
          <li class="list-group-item"><strong>Taxa:</strong> <?= $taxa?></li>
          <li class="list-group-item"><strong>Prestação Mensal:</strong> <?= $prestacao?></li>
        </ul>

          </div>
          <div class="col-md-6">

        <ul class="list-group">
          <li class="list-group-item"><strong>Valor Final:</strong> <?= $valorfinal?></li>
          <li class="list-group-item"><strong>Juros Pago na Operação:</strong> <?= $jurospago?></li>
        </ul>

          </div>
        </div>

<table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Nº Parcela</th>
                <th>Juros</th>
                <th>Saldo Devdor</th>
                <th>Price</th>
                <th>Saldo</th>
                <th>Valor princ</th>
                <th>Data Vencimento</th>
              </tr>
            </thead>
            <tbody>

            <?php 
            $parc = 0;
            $start_date = strtotime($date);
            $interval = 1;

            for ($i = 0; $i <$quota; $i += $interval) {
            
            $parc++;
            

            ?>
            <tr>

            <td><?= $parc?></td> 
            <td>--</td> 
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td>--</td>
            <td><?= date("d/m/Y", strtotime("+" . $i . " month", $start_date)) ?></td>

            </tr>
            <?php } ?>

            </tbody>
          </table>      

        <?php
        }
        ?>

        <?php //echo var_dump($dataProvider2);?>

      </div>
      </div>
    </div>
</div>

</div>
