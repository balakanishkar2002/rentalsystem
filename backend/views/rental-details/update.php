<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\RentalDetails */

$this->title = 'Update Rental Details: ' . $model->Rental_id;
$this->params['breadcrumbs'][] = ['label' => 'Rental Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Rental_id, 'url' => ['view', 'id' => $model->Rental_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rental-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
