<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RentalDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rental-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Rental_id') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'floor_id') ?>

    <?= $form->field($model, 'house_id') ?>

    <?= $form->field($model, 'Tenant_id') ?>

    <?php // echo $form->field($model, 'EB_startreading') ?>

    <?php // echo $form->field($model, 'EB_Endreading') ?>

    <?php // echo $form->field($model, 'RentMonth') ?>

    <?php // echo $form->field($model, 'RentYear') ?>

    <?php // echo $form->field($model, 'Rent_due') ?>

    <?php // echo $form->field($model, 'Rent_paid') ?>

    <?php // echo $form->field($model, 'Notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
