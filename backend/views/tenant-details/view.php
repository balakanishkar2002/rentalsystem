<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\TenantDetails */

$this->title = $model->Tenant_id;
$this->params['breadcrumbs'][] = ['label' => 'Tenant Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tenant-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->Tenant_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->Tenant_id], [
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
            'Tenant_id',
            'property_id',
            'floor_id',
            'house_id',
            'rent_amount',
            'water_amount',
            'advance_amount',
            'other_charges',
            'tenant_name',
            'tenant_mobile_no',
            'tenant_details:html',
            'created_date',
            'updated_date',
        ],
    ]) ?>

</div>
