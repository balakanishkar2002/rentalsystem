<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TenantDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tenant-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Tenant_id') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'floor_id') ?>

    <?= $form->field($model, 'house_id') ?>

    <?= $form->field($model, 'rent_amount') ?>

    <?php // echo $form->field($model, 'water_amount') ?>

    <?php // echo $form->field($model, 'advance_amount') ?>

    <?php // echo $form->field($model, 'other_charges') ?>

    <?php // echo $form->field($model, 'tenant_name') ?>

    <?php // echo $form->field($model, 'tenant_mobile_no') ?>

    <?php // echo $form->field($model, 'tenant_details') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
