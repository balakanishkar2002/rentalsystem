<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TenantDetails */

$this->title = 'Update Tenant Details: ' . $model->Tenant_id;
$this->params['breadcrumbs'][] = ['label' => 'Tenant Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Tenant_id, 'url' => ['view', 'id' => $model->Tenant_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tenant-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
