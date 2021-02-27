<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\RentalDetails */

$this->title = $model->Rental_id;
$this->params['breadcrumbs'][] = ['label' => 'Rental Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="rental-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Rental_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Rental_id], [
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
            'Rental_id',
            'property_id',
            'floor_id',
            'house_id',
            'Tenant_id',
            'EB_startreading',
            'EB_Endreading',
            'RentMonth',
            'RentYear',
            'Rent_due',
            'Rent_paid',
            'Notes',
        ],
    ]) ?>

</div>
