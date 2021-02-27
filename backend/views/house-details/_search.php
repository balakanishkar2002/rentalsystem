<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\HouseDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="house-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'house_id') ?>

    <?= $form->field($model, 'house_name') ?>

    <?= $form->field($model, 'property_id') ?>

    <?= $form->field($model, 'floor_id') ?>

    <?= $form->field($model, 'rent_amount') ?>

    <?php // echo $form->field($model, 'water_amount') ?>

    <?php // echo $form->field($model, 'EB_rate') ?>

    <?php // echo $form->field($model, 'House_details') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'updated_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
