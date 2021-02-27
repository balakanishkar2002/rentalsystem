<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TenantDetails */

$this->title = 'Create Tenant Details';
$this->params['breadcrumbs'][] = ['label' => 'Tenant Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tenant-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
