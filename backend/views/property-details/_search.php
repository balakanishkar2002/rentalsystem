<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PropertydetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propertydetails-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'property_name') ?>

    <?= $form->field($model, 'property_street1') ?>

    <?= $form->field($model, 'property_city') ?>

    <?= $form->field($model, 'property_state') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'Status') ?>

    <?php // echo $form->field($model, 'Ownername') ?>

    <?php // echo $form->field($model, 'Property_details') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
