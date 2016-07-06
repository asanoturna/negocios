<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Useradmin */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Useradmins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="useradmin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'updated_at',
            'created_at',
            'status',
            'email:email',
            'avatar',
            'fullname',
            'phone',
            'celphone',
            'birthdate',
            'location_id',
            'department_id',
            'can_admin',
            'can_visits',
            'can_productivity',
            'can_requestresources',
            'can_managervisits',
            'can_managerproductivity',
            'can_managerrequestresources',
        ],
    ]) ?>

</div>
